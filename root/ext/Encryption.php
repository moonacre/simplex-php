<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

class Encryption{

	public $encryption = array();

	public function __construct(){
		$this->encryption['PBKDF2_HASH_ALGORITHM'] = 'sha256';
		$this->encryption['PBKDF2_ITERATIONS'] = 1000;
		$this->encryption['PBKDF2_SALT_BYTE_SIZE'] = 24;
		$this->encryption['PBKDF2_HASH_BYTE_SIZE'] = 24;
		$this->encryption['HASH_SECTIONS'] = 4;
		$this->encryption['HASH_ALGORITHM_INDEX'] = 0;
		$this->encryption['HASH_ITERATION_INDEX'] = 1;
		$this->encryption['HASH_SALT_INDEX'] = 2;
		$this->encryption['HASH_PBKDF2_INDEX'] = 3;
	}

	public function generatePasswordHash($password){

		$salt = base64_encode(mcrypt_create_iv($this->encryption['PBKDF2_SALT_BYTE_SIZE'], MCRYPT_DEV_URANDOM));
		return $this->encryption['PBKDF2_HASH_ALGORITHM'] . ":" . $this->encryption['PBKDF2_ITERATIONS'] . ":" .  $salt . ":" .
			base64_encode($this->pbkdf2(
				$this->encryption['PBKDF2_HASH_ALGORITHM'],
				$password,
				$salt,
				$this->encryption['PBKDF2_ITERATIONS'],
				$this->encryption['PBKDF2_HASH_BYTE_SIZE'],
				true
			));
	}

	public function validatePasswordHash($password, $correct_hash){
		$params = explode(":", $correct_hash);
		if(count($params) < $this->encryption['HASH_SECTIONS'])
		   return false;
		$pbkdf2 = base64_decode($params[$this->encryption['HASH_PBKDF2_INDEX']]);
		return $this->slow_equals(
			$pbkdf2,
			$this->pbkdf2(
				$params[$this->encryption['HASH_ALGORITHM_INDEX']],
				$password,
				$params[$this->encryption['HASH_SALT_INDEX']],
				(int)$params[$this->encryption['HASH_ITERATION_INDEX']],
				strlen($pbkdf2),
				true
			)
		);
	}

	public function slow_equals($a, $b){
		$diff = strlen($a) ^ strlen($b);
		for($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
		{
			$diff |= ord($a[$i]) ^ ord($b[$i]);
		}
		return $diff === 0;
	}

	public function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false){
		$algorithm = strtolower($algorithm);
		if(!in_array($algorithm, hash_algos(), true))
			trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
		if($count <= 0 || $key_length <= 0)
			trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

		if (function_exists("hash_pbkdf2")) {

			if (!$raw_output) {
				$key_length = $key_length * 2;
			}
			return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
		}

		$hash_length = strlen(hash($algorithm, "", true));
		$block_count = ceil($key_length / $hash_length);

		$output = "";
		for($i = 1; $i <= $block_count; $i++) {

			$last = $salt . pack("N", $i);

			$last = $xorsum = hash_hmac($algorithm, $last, $password, true);

			for ($j = 1; $j < $count; $j++) {
				$xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
			}
			$output .= $xorsum;
		}

		if($raw_output)
			return substr($output, 0, $key_length);
		else
			return bin2hex(substr($output, 0, $key_length));
	}

}

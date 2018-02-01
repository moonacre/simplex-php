<?php 

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

class Model extends Database{

	public $encrypt;

	protected function __construct(){
		$this->encrypt = new Encryption();
	}

	public function _set($var,$value){
		$this->$var = $value;
	}

	public function _get($var){
		return $this->$var;
	}

	public function _getColumn($column,$table,$where,$_where){
		try{
			$con = $this->connect();
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = $con->prepare('SELECT '.$column.' FROM '.$table.' WHERE '.$where.' = :where');
			$query->bindParam(':where',$_where,PDO::PARAM_STR);
			$query->execute();
			return $query->fetch(PDO::FETCH_COLUMN);
			$con = [];
		}catch(PDOException $e){
			elog($e->getMessage());
		}
	}

	public function _update($table,$column,$value,$where,$_where){
		try{
			$con = $this->connect();
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = $con->prepare('UPDATE '.$table.' SET '.$column.' = :column WHERE '.$where.' = :where');
			$query->bindParam(':column', $value, PDO::PARAM_STR);
			$query->bindParam(':where', $_where, PDO::PARAM_STR);
			$query->execute();
			$con = [];
		}catch(PDOException $e){
			elog($e->getMessage());
		}
	}

	public function _delete($table,$where,$_where){
		try{
			$con = $this->connect();
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = $con->prepare('DELETE FROM '.$table.' WHERE '.$where.' = :where');
			$query->bindParam(':where',$_where,PDO::PARAM_STR);
			return $query->execute()?1:0;
			$con = [];
		}catch(PDOException $e){
			elog($e->getMessage());
		}
	}

}
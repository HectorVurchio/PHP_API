<?php
class Crud_PDO{
	//private $connection = null;
	private $errorInfo = null;
	private $recordset = null;
	private $recordsNumber = null;
	
	public function __construct($bd){
		$this->connection = $bd;
	}
	
	private function showError($pdoStatement){
		$this -> errorInfo = $pdoStatement -> errorInfo();
	}
	
	public function getRecordset(){
		return $this -> recordset;
	}
	
	public function getRecordsNumber(){
		return $this -> recordsNumber;
	}
	
	public function getErrorInfo(){
		return $this -> errorInfo;
	}
	
	public function singleReadAll($query, $param){
		$pdoStatement = $this->connection->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			foreach($param as $key=>$value){
				$pdoStatement->bindValue(intval($key),htmlspecialchars(strip_tags($value)),PDO::PARAM_INT);
			}
		if($pdoStatement->execute()){
			$this->recordsNumber = $pdoStatement->rowCount();
			$this->recordset = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
			return true;
		}else{
			$this->showError($pdoStatement);
			return false;
		}
	}
	
	public function singleReadOne($query, $param){
		$pdoStatement = $this->connection->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			foreach($param as $key=>$value){
				$pdoStatement->bindValue(intval($key),htmlspecialchars(strip_tags($value)),PDO::PARAM_INT);
			}
		if($pdoStatement->execute()){
			$this->recordsNumber = $pdoStatement->rowCount();
			$this->recordset = $pdoStatement->fetch(PDO::FETCH_ASSOC);
			return true;
		}else{
			$this->showError($pdoStatement);
			return false;
		}
	}
}
?>
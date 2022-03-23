<?php
class Database_PDO{
	private $connection = null;
	public function __construct($host,$dbname,$username,$password){
		$this->host = $host;
		$this->dbname = $dbname;
		$this->username = $username;
		$this->password = $password;
	}
	
	public function getConnection(){
		try{
			$this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,
										$this->username,
										$this->password);
		}catch(PDOException $e){
			echo 'Unsuccessful connection: '. $e->getMessage();
		}
		return $this->connection;
	}
}

?>
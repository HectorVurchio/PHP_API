<?php
class Config{
	private $host = 'localhost';
	private $dbname = 'first_vue_db';
	private $username = 'root';
	private $password = 'password';
	
	public function __construct(){
		
	}
	
	public function getVariables(){
		$var = array(
						$this->host,
						$this->dbname,
						$this->username,
						$this->password
					);
		return $var;
	}
}

?>
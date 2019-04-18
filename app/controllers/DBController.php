<?php
namespace Blog\controllers;
class DBController {
	private $host;
	private $username;
	private $password;
	private $db;
	protected $conn;
	public function __construct() {
		if (!isset($coon)) {
			$this->host='localhost';
			$this->username='root';
			$this->password='';
			$this->db='fblog';

			$this->conn= new \mysqli($this->host,$this->username,$this->password,$this->db);
			if ($this->conn->connect_error) {
				die("Connection failed: ".$this->conn->connect_error);
			}
		}
	}
	public function setConn($conn){
		$this->conn=$conn; 
	}
	public function getConn() {
		return $this->conn;
	}
}
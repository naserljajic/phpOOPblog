<?php
namespace Blog\models;
use Blog\controllers\DBController;
class User extends DBController {
	private $usern;
	private $password;
	private $email;
	private $id;
	public function __construct() {
		parent::__construct();
	}
	public function setUsername($username) {
		$this->usern=$username;
	}
	public function setPassword($password) {
		
		$this->password=$password;
	}
	public function setEmail($email) {
		$this->email=$email;
	}
	public function setID($usern) {
		$sql="SELECT id FROM author WHERE username='".$usern."'";
		$authorsID=$this->getConn()->query($sql);
		foreach($authorsID as $key => $authorID) {
			$this->id=$authorID['id'];
		}
		//echo $rows['id'];
		//$this->id=$rows['id'];
	}
	public function getUsername() {
		return $this->usern;
	}
	public function getPassword() {
		return $this->password;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getUserID() {
		return $this->id;
	}
	
}
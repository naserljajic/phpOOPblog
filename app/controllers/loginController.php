<?php
namespace Blog\controllers;
use Blog\models\User;
class loginController {
	
	public function loginValidate(User $user) {
		$sql="SELECT * FROM author WHERE username='".$user->getUsername()."' AND password='".$user->getPassword()."'";
		$result=$user->getConn()->query($sql);
		if ($result == false || !((mysqli_num_rows($result)) == 1)) {
			return false;
		}
		$author=array();
		while ($row = $result->fetch_assoc()) {
			$author[]=$row;
			# code...
		}
		return $author;
	}
	
}
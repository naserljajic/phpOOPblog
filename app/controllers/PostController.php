<?php
namespace Blog\controllers;
use Blog\models\Posts;
class PostController {

	public function addnewPost(Posts $post){
		$date_posted=date('Y-m-d');
		$sql="INSERT INTO posts (title,post,author_id,date_posted) VALUES ('".$post->getTitle()."','".$post->getPost()."',".$post->getAuthorID().",'".$date_posted."')";
		if ($post->getConn()->query($sql) === TRUE) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	public function getDate($month) {
		switch ($month) {
		case "01":
			$month="Janary";
			break;
		case "02":
			$month="February";
			break;
		case "03":
			$month="March";
			break;
		case "04":
			$month="April";
			break;
		case "05":
			$month="May";
			break;
		case "06":
			$month="June";
			break;
		case "07":
			$month="July";
			break;
		case "08":
			$month="August";
			break;
		case "09":
			$month="September";
			break;
		case "10";
			$month="October";
			break;
		case "11";
			$month="November";
			break;
		case "12";
			$month="December";
			break;

		default:
			# code...
			break;
	}
	return $month;

	}
}
?>
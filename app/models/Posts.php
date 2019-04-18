<?php
namespace Blog\models;
use Blog\controllers\DBController;
use Blog\controllers\PostController;
class Posts extends DBController {
	private $title;
	private $post;
	private $author;
	private $authorID;
	private $date_posted;
	public function __construct() {
		parent::__construct();
	}
	public function setTitle($title) {
		$this->title=$title;
	}
	public function setPost($post) {
		$this->post=$post;
	}
	public function setAuthor($author) {
		$sql="SELECT firstLastName FROM author WHERE id=".$author;
		$firstLastName=$this->getPosts($sql);
		foreach ($firstLastName as $key => $firstLast) {
			$this->author=$firstLast['firstLastName'];
		}
	}
	public function setAuthorID($authorID) {
		$this->authorID=$authorID;
	}
	public function setDatePosted($date_posted) {
		$splitDate=explode("-",$date_posted);
		$postController=new PostController();
		$month=$postController->getDate($splitDate[1]);
		$this->date_posted=" on ".$month." ".$splitDate[2].", ".$splitDate[0];
	}
	public function getTitle() {
		return $this->title;
	}
	public function getPost() {
		return $this->post;
	}
	public function getAuthor() {
		return $this->author;
	}
	public function getAuthorID() {
		return $this->authorID;
	}
	public function getDatePosted() {
		return $this->date_posted;
	}
	public function setDetails($title,$post=null,$authorID=null,$date_posted=null) {
		$this->setTitle($title);
		$this->setPost($post);
		$this->setAuthor($authorID);
		$this->setAuthorID($authorID);
		$this->setDatePosted($date_posted);
	}

	public function getDetails() {
		return ['title'=>$this->title,'post'=>$this->post,'author'=>$this->author,'date_posted'=>$this->date_posted];
	}
	
	public function getPosts($query) {
		$result=$this->conn->query($query);
		if ($result == false || ((mysqli_num_rows($result)) == 0)) {
			return false;
		}
		$rows= array();

		while($row = $result->fetch_assoc()) {
			$rows[]= $row;
		}
		return $rows;
	}

}
<?php
use Blog\core\Controller;
class siteController extends Controller{
	public function index() {
		$this->view('site/index');
	}
	public function login() {
		$this->view('site/login');
	}
	public function addpost() {
		$this->view('site/addpost');
	}
	public function logout() {
		$this->view('site/logout');
	}
	public function post() {
		$this->view('site/post');
	}

}
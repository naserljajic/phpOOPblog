<?php
namespace Blog\core;
class Controller {
	public function view($view, $data=[]) {
		require_once './app/views/'.$view.'.php';
	}

}
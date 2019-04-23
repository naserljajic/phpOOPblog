<?php
namespace Blog\core;
use Blog\core\Controller;
class App extends Controller{
	protected $controller='siteController';
	protected $method='index';
	public function __construct () {
		$url=$this->parseUrl();
		require_once './app/controllers/'.$this->controller.'.php';
		$this->controller=new $this->controller;
		if (isset($url[0])) {
			if (method_exists($this->controller, $url[0])) {
				$this->method=$url[0];
				unset($url[0]);
			}
		}
		call_user_func([$this->controller,$this->method]);

	}
	public function parseUrl() {
		if (isset($_GET['url'])) {
			return $url=explode('/', filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
		}
	}
	
}
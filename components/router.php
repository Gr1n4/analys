<?php 

class Router
{
	private $routes;

	public function __construct() {
		$routes_path = ROOT . '/config/routes.php';
		$this->routes = include($routes_path);
	}

	private function get_uri() {
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run() {
		$uri = $this->get_uri();

		$controller_name = $uri . '_controller';
		$controller_file = ROOT . '/controller/' . $controller_name . '.php';

		if (file_exists($controller_file)) {
			include_once($controller_file);
			$controller_omject = new $controller_name;
		}
	}
}
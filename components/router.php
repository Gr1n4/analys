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

		foreach ($this->routes as $uri_pattern => $path) {
			if ($uri_pattern == $uri) {

				$segments = explode('/', $uri_pattern);
				$controller_name = ucfirst($segments[0] . '_controller');
				$controller_file = ROOT . '/controller/' . $controller_name . '.php';
				$action_name = 'action_' . $path;

				if (file_exists($controller_file)) {
					include_once($controller_file);
					$controller_object = new $controller_name;
					$result = $controller_object->$action_name();
					if ($result != null) {
						break;
					}
				}
			}
		}
	}
}
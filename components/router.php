<?php 

class Router
{
	private $routes;
	private $i;

	public function __construct() {
		$routes_path = dir . '/config/routes.php';
		$this->routes = include($routes_path);
	}

	private function get_uri() {
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run() {
		$uri = $this->get_uri();

		$this->i = 0;

		foreach ($this->routes as $uri_pattern => $path) {
			$this->i++;
			if (preg_match("~$uri_pattern~", $uri)) {

				$param_rout = preg_replace("~$uri_pattern~", $path, $uri);
				$segments = explode('/', $param_rout);

				$controller_name = ucfirst(array_shift($segments) . '_controller');
				$controller_file = dir . '/controller/' . $controller_name . '.php';
				$action_name = 'action_' . array_shift($segments);

				if (file_exists($controller_file)) {
					include_once($controller_file);
					$controller_object = new $controller_name;
					$result = $controller_object->$action_name();
					if ($result != null) {
						break;
					}
				}
			} elseif (count($this->routes) == $this->i) {
				header('Location: /');
			}
		}
	}
}
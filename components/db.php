<?php

class Db {
	
	public static function get_connection() {
		$params_path = ROOT . '/config/db_params.php';
		$params = include($params_path);

		$dsn = "mysql:host={$params]'host']}; dbname={$params['dbname']}";
		$db = new PDO($dsn, $params['user'], $params['password']);

		return $db;
	}
}
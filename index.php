<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();


define('dir', dirname(__FILE__));
require_once(dir . '/components/router.php');
require_once(dir . '/components/db.php');

$router = new Router();
$router->run();

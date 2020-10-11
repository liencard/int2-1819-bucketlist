<?php
/*
 *
*/
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

// eventueel nog met een session werken

// set routes
$routes = array(
  'home' => array(
    'controller' => 'Items',
    'action' => 'index'
  ),
  'detail' => array(
    'controller' => 'Items',
    'action' => 'detail'
  ),
  'test' => array(
    'controller' => 'Items',
    'action' => 'test'
  )
);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();

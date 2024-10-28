<?php
session_start();

require 'bootstrap.php';
$role = isset($_GET['role']) ? $_GET['role'] : 'client';
if($role == 'admin'){
    checkAdmin($role);
}
// HomeController
$controllerName = ucfirst(strtolower(isset($_GET['controller']) ? $_GET['controller'] : 'home') . 'Controller');
changeController($controllerName);

// client/HomeController
$controller = $role . '/' . $controllerName;

// exist controllers/client/HomeController.php

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$key = isset($_GET['key']) ? $_GET['key'] : '';

if (file_exists('controllers/' . $controller . '.php')) {
    require 'controllers/' . $controller . '.php';
    $controllerObject = new $controllerName();
    if (method_exists($controllerName, $action)) {
        $controllerObject->$action();
    } else {
        $controllerObject->index();
    }
}

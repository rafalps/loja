<?php

require_once 'config/Database.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

$controllerName = ucfirst($page) . 'Controller';
$controllerFile = "src/controllers/{$controllerName}.php";

if (file_exists($controllerFile)) {

    require_once $controllerFile;
    $controller = new $controllerName();

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }
    
    if (method_exists($controller, $action)) {
        if (isset($_GET['id'])) {
            $controller->$action($_GET['id']);
        } else {
            $controller->$action();
        }
    } else {
        http_response_code(404);
        echo "Página não encontrada.";
    }
} else {
    http_response_code(404);
    echo "Página não encontrada.";
}

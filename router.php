<?php

require_once 'app/index.php';
require_once 'app/productos.php';
require_once 'app/login-register.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define("URL_PRODUCT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/producto');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/register');
define("URL_USER", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/admin');


$action = 'producto'; 

if (!empty($_GET['action'])) { 
    $action = $_GET['action'];
}


$params = explode('/', $action);


switch ($params[0]) {
    case 'index':
        getIndex();
        break;
    case 'producto':
        getProducto();
        break;
    case 'register':
        getRegister();
        break;
    case 'addProduct':
        addProduct();
        break;
    case 'delProduct':
        removeProduct($params[1]);
        break;
    case 'editar':
        modifyProduct($params[1]);
        break;
    case 'addUser':
        registerUser();
        break;
    case 'iniciarSesion':
        loginIn();
        break;
        case 'logout':
        logout();
        break;                    
    default:
        echo('404 Page not found');
        break;
}
?>
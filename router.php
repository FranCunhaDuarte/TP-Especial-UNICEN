<?php

require_once './app/controllers/ProductController.php';
require_once './app/controllers/UserController.php';
require_once './app/helper/UserHelper.php';



define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define("URL_PRODUCT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/producto');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/register');
define("URL_USER", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/admin');

$productosController = new ProductController();
$user = new UserController();

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
        $productosController->getProducto();
        break;
    case 'register':
        $user->showLogin();
        break;
    case 'addProduct':
        $productosController->addProduct();
        break;
    case 'delProduct':
        $productosController->removeProduct($params[1]);
        break;
    case 'editar':
        $productosController->modifyProduct($params[1]);
        break;
    case 'addUser':
        $user->registerUser();
        break;
    case 'iniciarSesion':
        $user->loginIn();
        break;
        case 'logout':
        UserHelper::logout();
        break;      
        // case 'usuarios':
        //     getUsuarios();
        //     break;                
    default:
        echo('404 Page not found');
        break;
}
?>
<?php

require_once './app/controllers/ProductController.php';
require_once './app/controllers/CategoriesController.php';
require_once './app/controllers/UserController.php';
require_once './app/helper/UserHelper.php';



define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define("URL_PRODUCT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/productos');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/register');
define("URL_USER", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/admin');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("URL_CATEGORIES", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/categories');

$productosController = new ProductController();
$category = new CategoriesController();
$user = new UserController();

$action = 'productos'; 

if (!empty($_GET['action'])) { 
    $action = $_GET['action'];
}


$params = explode('/', $action);


switch ($params[0]) {
    case 'index':
        $productosController->getIndex();
        break;
    case 'productos':
        $productosController->getProducts();
        break;
    case 'producto':
        $productosController->getProduct($params[1]);
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
    case 'categories':
        $categoryId = isset($params[1]) ? $params[1] : null;
        $category->getCategories1($categoryId);
        break;
    case 'delCategory':
        $category->removeCategory($params[1]);
        break;
    case 'addCategory':
        $category->addCategory();
        break;
    case 'modifyCategory':
        $category->updateCategory($params[1]);
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
    default:
        echo('404 Page not found');
        break;
}
?>
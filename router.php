<?php

require_once 'app/index.php';
require_once 'app/productos.php';
require_once 'app/login-register.php';



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
    case 'updateProduct':
        modifyProduct($params[1]);
        break;
    default:
        echo('404 Page not found');
        break;
}
?>
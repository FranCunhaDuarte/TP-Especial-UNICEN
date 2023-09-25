<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>TecnoMundo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="grid-header">
        <div class="container-logo">
            <a href="index" class="container-logo">
                <img src="img/logo.png" alt="logo" class="logo">
                <h1 class="logo-text">TecnoMundo</h1>
            </a>
        </div>
        <div class="container-search-bar">
            <input type="text" class="search-bar" placeholder="Buscar...">
        </div>
</header>

<nav class="grid-nav nav-bar">
        <ul class="nav-list-main">
            <li><a href="index" class="index-home">Inicio</a></li>
            <li><a href="producto" class="index-products nav-text">Productos</a></li>
            <li><a href="register" class="index-contact nav-text">Login/Register</a></li>
            <?php if(isset($_SESSION['tipouser']) && $_SESSION['tipouser'] =="administrador"){ ?>
                <li><a href="usuarios" class="index-contact nav-text">Usuarios</a></li>
            <?php } ?>
            <?php if(isset($_SESSION['user'])){ ?>
                <li><a href="logout" class="index-contact nav-text">Cerrar Sesion</a></li>
            <?php } ?>
        </ul>
        <i class="fa-solid fa-bars button-var"></i>
        <ul class="nav-list hide-menu">
            <li><a href="index" class="index-home">Inicio</a></li>
            <li><a href="producto" class="index-products nav-text">Productos</a></li>
            <li><a href="register" class="index-contact nav-text">Login/Register</a></li>
        </ul>
</nav>
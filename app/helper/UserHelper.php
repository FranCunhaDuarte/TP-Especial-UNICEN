<?php

class UserHelper {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }else{
            return true;
        }
    }

    public static function login($user) {
        UserHelper::init();
        $_SESSION['user'] = $user->user;
        $_SESSION['tipouser'] = $user->tipousuario;
    }

    public static function logout() {
        UserHelper::init();
        session_destroy();
        header('Location: ' . URL_LOGIN);
    }

    public static function verify() {
        UserHelper::init();
        if (isset($_SESSION['user'])) {
            if($_SESSION['tipouser']=="Administrador"){
                return "Administrador";
            }
            else if($_SESSION['tipouser']=="Usuario"){
                return "Usuario";
            }
        }
        else {
            return "anonimo";
        }
    }

    public static function checkSession(){
        UserHelper::init();
        if(isset($_SESSION['user'])){
            return true;
        }
        return false;     
    }
}
?>
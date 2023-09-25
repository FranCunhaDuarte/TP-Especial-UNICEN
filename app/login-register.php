<?php
    require_once "user_db.php";
    require_once "config.php";
    
function getRegister(){
        require_once 'templates/header.php';
        if(isset($_SESSION['user'])){
            header('Location: ' . URL_PRODUCT);
        }

        echo '<main class="grid-main-contact">
        <div class="container-form">
            <div class="container-back">
                <div class="container-back-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar en la pagina</p>
                    <button id="button-sing-in">Iniciar Sesion</button>
                </div>
                <div class="container-back-register">
                    <h3>¿Aun no tienes una cuenta?</h3>
                    <p>Registrate ahora!</p>
                    <button id="button-sing-up">Registrarse</button>
                </div>
            </div>
            <div class="container-login-register">
                <form action="iniciarSesion" class="form-login" method="POST">
                    <h2>Iniciar Sesion</h2>
                    <input type="text" name ="user" placeholder="Correo electronico">
                    <input type="password" name ="password" placeholder="Contraseña">
                    <button type="submit">Iniciar Sesion</button>
                </form>
                <form action="addUser" class="form-register ocultar" method="POST">
                    <h2>Registrarse</h2>
                    <input type="text" name ="fullname" placeholder="Nombre completo">
                    <input type="text" name ="user" placeholder="Usuario">
                    <input type="email" name ="email" placeholder="Correo electronico">
                    <input type="password" name ="password" placeholder="Contraseña">
                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </div>

        </main>';

        require_once 'templates/footer.php';
    
}

    function registerUser(){
        //VALIDAR DATOS
        $name = $_POST['fullname'];
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        insertUser($name, $user, $email, $password);
        header('Location: ' . URL_LOGIN);
    }


    function loginIn(){
        $user = $_POST['user'];
        $password = $_POST['password'];

        $user = getUser($user);
        if(isset($_POST['user']) && isset($_POST['password'])){
            if($password == $user->password){
                session_start();
                $_SESSION['user'] = $user->user;
                $_SESSION['tipouser'] = $user->tipousuario;
                header('Location: ' . URL_PRODUCT);
            }else{
                header('Location: ' . URL_LOGIN);
            }

        }
        
    }

    function logout(){
        session_start();
        session_destroy();
        header('Location: ' . URL_LOGIN);
    }


?>

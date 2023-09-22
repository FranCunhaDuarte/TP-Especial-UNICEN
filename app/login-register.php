<?php

function getRegister(){
        require_once 'templates/header.php';
?>
        <main class="grid-main-contact">
        <div class="container-form">
            <div class="container-back">
                <div class="container-back-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar en la pagina</p>
                    <button id="button-sing in">Iniciar Sesion</button>
                </div>
                <div class="container-back-register">
                    <h3>¿Aun no tienes una cuenta?</h3>
                    <p>Registrate ahora!</p>
                    <button id="button-sing up">Registrarse</button>
                </div>
            </div>
            <div class="container-login-register">
                <form action="" class="form-login">
                    <h2>Iniciar Sesion</h2>
                    <input type="email" placeholder="Correo electronico">
                    <input type="password" placeholder="Contraseña">
                    <button type="submit">Iniciar Sesion</button>
                </form>
                <form action="" class="form-register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre completo">
                    <input type="text" placeholder="Usuario">
                    <input type="email" placeholder="Correo electronico">
                    <input type="password" placeholder="Contraseña">
                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </div>

        </main>
<?php
        require_once 'templates/footer.php';
    }
?>

<?php

function getRegister(){
        require_once 'templates/header.php';
        
       echo ' <main class="grid-main-contact">
        <div class="contact-container">
            <h3 class="contact-title">REGISTER</h3>
                <form action="" class="contact-form">
                    <input type="text" class="input-form-contact" placeholder="Nombre">
                    <input type="text" class="input-form-contact" placeholder="Apellido">
                    <input type="email" class="input-form-contact" placeholder="E-mail">
                    <input type="text" class="input-form-contact" placeholder="Asunto">
                    <textarea name="" class="" placeholder="Mensaje"></textarea>
                    <div class="contenedor_captcha">
                        <div class="contenedor_hijo">
                            <div class="captcha"></div>
                            <button id="recargar">Recargar</button>
                        </div>
                        <input class="ingreso_captcha" type="text"placeholder="Ingresar captcha" required>
                        <div class="resultado"></div>
                    </div>
                    <input type="submit" id="submit-button">
                </form>
            </div> 
        </main>';
        require_once 'templates/footer.php';
    }
?>
document.getElementById("button-sing up").addEventListener("click", register);
document.getElementById("button-sing in").addEventListener("click", login);

let barra_navegacion=document.querySelector(".nav-list");
let boton_ocultar=document.querySelector(".button-var");
boton_ocultar.addEventListener("click", ocultarBarra);

function ocultarBarra(){
    barra_navegacion.classList.toggle("hide-menu");
}


let container_login_register = document.querySelector(".container-login-register");
let form_login = document.querySelector(".form-login");
let form_register = document.querySelector(".form-register");
let contain_back_login = document.querySelector(".container-back-login");
let contain_back_register = document.querySelector(".container-back-register");

function register(){
    form_register.style.display = "block";
    container_login_register.style.left = "410px";
    form_login.style.display = "none";
    contain_back_register.style.opacity = "0";
    contain_back_login.style.opacity = "1";
}

function login(){
    form_register.style.display = "none";
    container_login_register.style.left = "10px";
    form_login.style.display = "block";
    contain_back_register.style.opacity = "1";
    contain_back_login.style.opacity = "0";
}


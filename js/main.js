let button_sing_up = document.querySelector("#button-sing-up");
let button_sing_in = document.querySelector("#button-sing-in");
if(button_sing_in) button_sing_in.addEventListener("click", login);
if(button_sing_up) button_sing_up.addEventListener("click", register);

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
    form_register.style.display = "flex";
    container_login_register.style.left = "51.5%";
    form_login.style.display = "none";
    contain_back_register.style.opacity = "0";
    contain_back_login.style.opacity = "1";
}

function login(){
    form_register.style.display = "none";
    container_login_register.style.left = "10px";
    form_login.style.display = "flex";
    contain_back_register.style.opacity = "1";
    contain_back_login.style.opacity = "0";
}

let botones = document.querySelectorAll(".modify");
if (botones) {
    botones.forEach(boton => {
        boton.addEventListener("click", () => {
            let formulario = boton.previousElementSibling;
            if (formulario) {
                formulario.classList.toggle("ocultar");
            }
        });
    });
}

let botonesCerrar = document.querySelectorAll(".cerrar");
if (botonesCerrar) {
    botonesCerrar.forEach(boton => {
        boton.addEventListener("click", () => {
            let formulario = boton.parentElement; // Obtén el contenedor del formulario
            if (formulario) {
                formulario.classList.add("ocultar");
            }
        });
    });
}

login();



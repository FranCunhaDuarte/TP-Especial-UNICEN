
let barra_navegacion=document.querySelector(".nav-list");
let boton_ocultar=document.querySelector(".button-var");
boton_ocultar.addEventListener("click", ocultarBarra);

function ocultarBarra(){
    barra_navegacion.classList.toggle("hide-menu");
}

document.addEventListener("DOMContentLoaded", cargarHomeHtml);
let home = document.querySelector(".homehtml")
let form = document.querySelector(".formhtml");
let tabla= document.querySelector(".tablahtml");
if(home){
  home.addEventListener("click",cargarHomeHtml );
}
if(tabla){
tabla.addEventListener("click", cargarTablaHtml);
}
if(form){
  form.addEventListener("click", cargarContactoHtml);
}
const urlP = 'https://62b39bf54f851f87f45d639b.mockapi.io/api/procesadores';
const urlM = 'https://62b39bf54f851f87f45d639b.mockapi.io/api/memorias';
let id=0;
 /*-------------------BARRA NAVEGACION -----------------*/ 
  const ocultarMenu = ()=>{
    document.querySelector(".barraNavegacion").classList.toggle("ocultar");
  }
  document.querySelector(".btn_menu").addEventListener("click", ocultarMenu);



  /*CARGA AJAX-PARTIAL*/

  async function cargarHomeHtml (event) {
    event.preventDefault();
    let container = document.querySelector(".contenedorHtml");
    container.innerHTML = "<h1> Loading....</h1>";
    try{
    let response = await fetch("home.html");
      if (response.ok) {
          let texto = await response.text()
          container.innerHTML = texto;  
      } 
      else{
            container.innerHTML = "<h1>Error - Failed URL!</h1>";
      }
       } catch(error){
            console.log(error);
            container.innerHTML = "<h1>Error - Connection Failed!</h1>";
        };
    }
  
  async function  cargarTablaHtml(event) {
      event.preventDefault();
      let container = document.querySelector(".contenedorHtml");
      container.innerHTML = "<h1> Loading....</h1>";
      try{
      let response = await fetch("tablet.html");
        if (response.ok) {
              let texto = await response.text();
              container.innerHTML= texto;
           
              document.querySelector("#selectCategoria").addEventListener("change", verificarSelect);
              document.querySelector("#insertar").addEventListener("click", enviarProcesador);
              document.querySelector("#insertarTres").addEventListener("click", enviarProductoTres);
              obtenerProductosP();
        } else
                container.innerHTML = "<h1>Error - Failed URL!</h1>";
          }
          catch(error){
              console.log(error);
              container.innerHTML = "<h1>Error - Connection Failed!</h1>";
          };
      }


async  function cargarContactoHtml (event){
    event.preventDefault();
    let container = document.querySelector(".contenedorHtml");
    container.innerHTML = "<h1> Loading....</h1>";
    try{
      let response = await fetch("form.html");
          if (response.ok) {
            let texto = await response.text();
                container.innerHTML = texto;
                Captcha();             
                document.querySelector("#form").addEventListener("submit", ValidarCaptcha);
                document.querySelector(".refresh").addEventListener("click", RecargarCaptcha);
                
          }else
                container.innerHTML = "<h1>Error - Failed URL!</h1>";
        
          } catch(error){
            console.log(error);
            container.innerHTML = "<h1>Error - Connection Failed!</h1>";
        };
      }
/*---------------- FORMULARIO -------------------*/ 

let ArrayCaracteres = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R',
'S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r'
,'s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9');

function Captcha(){
  let captcha =document.querySelector(".contenedorCaptcha");
  for (i=0;i<6;i++){
      if(captcha){
        let Ramdom = ArrayCaracteres[Math.floor(Math.random() * ArrayCaracteres.length)];
        captcha.innerText += ` ${Ramdom}`;
  }
 }
}
function RecargarCaptcha(){
  let captcha = document.querySelector(".contenedorCaptcha");
      captcha.innerHTML= "";
      Captcha();
}

function ValidarCaptcha(e){
  e.preventDefault();
  let submit = document.querySelector("#form");
  let captcha =document.querySelector(".contenedorCaptcha");
  let inputCap= document.querySelector(".inputCaptcha");
  let respuesta = document.querySelector(".respuestaCaptcha");  
  let comprobar = inputCap.value.split('').join(' ');
  if(comprobar == captcha.innerHTML){
      respuesta.classList.add("Pcaptcha");
      respuesta.innerHTML = "Captcha verificado correctamente";
      setTimeout(function(){ 
        submit.submit(); 
      }, 1000);
}
  else{
      respuesta.innerHTML = "Captcha incorrecto, vuelva a intentarlo"; 
      setTimeout(function(){ 
        respuesta.innerHTML = ""; 
      }, 1000);
  
 }
}

/*------------------ TABLA -------------------*/

function verificarSelect(){
  let selector = document.querySelector("#selectCategoria").value;
 if(selector=="Procesadores"){
  obtenerProductosP();
  document.querySelector("#insertar").addEventListener("click", enviarProcesador);   
 }
 if(selector=="MemoriaRam"){
  obtenerProductosM();
  document.querySelector("#insertar").addEventListener("click", enviarMemoria);
 }
}


async function enviarProcesador(){
  let selector = document.querySelector("#selectCategoria").value;
  let producto = document.querySelector("#producto").value;
  let precio = document.querySelector("#precio").value;
  if(producto!=''&&precio!=''){
  let objetoProducto= {
          "producto" : producto,
          "precio" : precio
      };
    
      if(selector=="Procesadores"){       
      try {
          let res = await fetch(urlP, {
              "method": "POST",
              "headers": { "Content-type": "application/json" },
              "body": JSON.stringify(objetoProducto)
          });   
          if (res.status == 201) {
              console.log("Has agregado un nuevo procesador");
          }
       } catch (error) {
          console.log(error);
       }   
       obtenerProductosP(); 
      } 
    }    
}

async function enviarMemoria(){
  let selector = document.querySelector("#selectCategoria").value;
  let producto = document.querySelector("#producto").value;
  let precio = document.querySelector("#precio").value;
  if(producto!=''&&precio!=''){
  let objetoProducto= {
          "producto" : producto,
          "precio" : precio
      };
      if(selector=="MemoriaRam"){       
          try {
              let res = await fetch(urlM, {
                  "method": "POST",
                  "headers": { "Content-type": "application/json" },
                  "body": JSON.stringify(objetoProducto)
              });   
              if (res.status == 201) {
                  console.log("Has agregado una nueva Memoria");
              }
           } catch (error) {
              console.log(error);
           }   
           obtenerProductosM(); 
          }  
  }       
}
async function enviarProductoTres(){
  let selector = document.querySelector("#selectCategoria").value;

      if(selector=="Procesadores"){
          for(let i=0; i<3; i++){  
              enviarProcesador();    
          }   
       obtenerProductosP(); 
      }
      if(selector=="MemoriaRam"){       
          for(let i=0; i<3; i++){  
              enviarMemoria();    
          }   
       obtenerProductosM(); 
}
}
async function modificarProducto(idd){
  let selector = document.querySelector("#selectCategoria").value;
  let producto = document.querySelector("#producto").value;
  let precio = document.querySelector("#precio").value;
  if(producto!=''&&precio!=''){
  let objetoProducto= {
          "producto" : producto,
          "precio" : precio
      };
      try {
          if(selector=="Procesadores"){
          let res = await fetch(`${urlP}/${idd}`, {
              "method": "PUT",
              "headers": { "Content-type": "application/json" },
              "body": JSON.stringify(objetoProducto)
          });       
          if (res.status == 200) {
              console.log("Procesador modificado!");
              obtenerProductosP();
          }
      }
      if(selector=="MemoriaRam"){
          let res = await fetch(`${urlM}/${idd}`, {
              "method": "PUT",
              "headers": { "Content-type": "application/json" },
              "body": JSON.stringify(objetoProducto)
          });       
          if (res.status == 200) {
              console.log("Memoria modificada!");
              obtenerProductosM();
          }
      }
       } catch (error) {
          console.log(error);
       }   
  }     
}

async function eliminarProductos(idd){
  let selector = document.querySelector("#selectCategoria").value;
      try {
          if(selector=="Procesadores"){
          let res = await fetch(`${urlP}/${idd}`, {
              "method": "DELETE",
      });
          if (res.status == 200) {
          console.log("Procesador eliminado!");
          obtenerProductosP();
          }
          }
          if(selector=="MemoriaRam"){
              let res = await fetch(`${urlM}/${idd}`, {
                  "method": "DELETE",
          });
              
          if (res.status == 200) {
              console.log("Memoria eliminada!");
              obtenerProductosM();
              }
          }
       } catch (error) {
          console.log(error);
       }
      }

async function obtenerProductosP(){
  const tabla = document.querySelector(".tablaProductos");
  try {
      let respuesta = await fetch(urlP); 
      if(respuesta.ok){
          let json = await respuesta.json();    
          console.log(json);
          tabla.innerHTML = ""; 
          tabla.innerHTML=                  
                  `<tr>
                  <th class="tituloTabla" colspan="4">Procesadores</th>
                  </tr>
                  <tr>           
                      <th>Productos</th>
                      <th>Precio</th>                              
                  </tr>`;                    
          for(let productos of json){
              let nombre = productos.producto;
              let precio = productos.precio;
              id = productos.id;
              tabla.innerHTML +=
                  `<tr>
                      <td>${nombre}</td>
                      <td>$ ${precio}</td>
                      <td><button class="borra" value="${id}">Borrar</button></td>
                      <td><button class="modifica" value="${id}">Modificar</button></td>
                  </tr>`                 
                  let borrarid = document.querySelectorAll(".borra");
                  borrarid.forEach(element => {
                          element.addEventListener("click", ()=>{
                          id = element.value;                          
                          eliminarProductos(id);                   
                      });
                  });
                  let modificarid = document.querySelectorAll(".modifica");
                  modificarid.forEach(element => {
                          element.addEventListener("click", ()=>{
                          id = element.value;                          
                          modificarProducto(id);                   
                      });
                  });         
          }
      }
  }catch (error) {
      console.log(error);
  }
}

async function obtenerProductosM(){
  const tabla = document.querySelector(".tablaProductos");
  try {
      let respuesta = await fetch(urlM); 
      if(respuesta.ok){
          let json = await respuesta.json();    
          console.log(json);
          tabla.innerHTML = ""; 
          tabla.innerHTML=                  
                  `<tr>
                  <th class="tituloTabla" colspan="4">Memorias RAM</th>
                  </tr>
                  <tr>           
                      <th>Productos</th>
                      <th>Precio</th>                              
                  </tr>`;                    
          for(let productos of json){
              let nombre = productos.producto;
              let precio = productos.precio;
              id = productos.id;
              tabla.innerHTML +=
                  `<tr>
                      <td>${nombre}</td>
                      <td>$ ${precio}</td>
                      <td><button class="borra" value="${id}">Borrar</button></td>
                      <td><button class="modifica" value="${id}">Modificar</button></td>
                  </tr>`                 
                  let borrarid = document.querySelectorAll(".borra");
                  borrarid.forEach(element => {
                          element.addEventListener("click", ()=>{
                          id = element.value;                          
                          eliminarProductos(id);                   
                      });
                  });
                  let modificarid = document.querySelectorAll(".modifica");
                  modificarid.forEach(element => {
                          element.addEventListener("click", ()=>{
                          id = element.value;                          
                          modificarProducto(id);                   
                      });
                  });         
          }
      }
  }catch (error) {
      console.log(error);
  }
}

  

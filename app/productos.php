<?php

function getProducto(){
    require_once 'templates/header.php';
?>
    <main class="grid-main-products">
        <div class="container-products">
            <div class="container-img">
                <div>
                    <img src="https://fullh4rd.com.ar/img/productos/1/micro-amd-ryzen-9-5900x-scooler-svideo-0.jpg" alt="">
                </div>
            </div>  
            <div class="container-descripcion">   
                <div class="name-product">
                    <h2>Ryzen 9</h2>
                </div>
                <div><p>Micro AMD Ryzen 9 5900X 4.8 Ghz AM4 bla bla bla bla bla</p></div>
                <div><p>90000</p></div>
                <div>
                    <button>COMPRAR</button>
                </div>
            </div>       
        </div>
    </main>

<?php
    require_once 'templates/footer.php';
}

?>
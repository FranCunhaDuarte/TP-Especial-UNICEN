<?php
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
require_once "db.php";

function getProducto(){
    require_once 'templates/header.php';
    $products = getProducts();
?>
    <main class="grid-main-products">
        <div class="form-products">
            <form action="addProduct" method="post">
                <label>Producto</label>
                <input class="" name="name" type="text">
                <label>Descripcion</label>
                <input class="" name="description" type="text">
                <label>Precio</label>
                <input class="" name="price" type="number">
                <label>Imagen</label>
                <input type="text" name="img" placeholder="Inserte link de la imagen">
                <button type="submit">ENVIAR</button>
            </form>
        </div>
        

        <div class="container-products">
        <?php foreach($products as $product) {?>
            <div class="container-product">
                <div class="container-img">
                    <img src="<?php echo $product->img ?>" alt="">
                </div>  
                <div class="container-descripcion">   
                    <div class="name-product">
                        <h2><?php echo $product->name ?></h2>
                    </div>
                    <div class="description-product"><p><?php echo $product->description ?></p></div>
                    <div class="price-product"><p><?php echo $product->price ?></p></div>
                    <div class="buttons-container">
                        <div><button id="probando"><a href="delProduct/<?php echo $product->id_product?>">BORRAR</a></button></div>
                        <button class="probando">EDITAR</button>
                        <div><button>COMPRAR</button></div>
                    </div>
        </div>
                </div>       
            </div>
            <?php
                } 
            ?>
        </div>
    </main>

<?php
    require_once 'templates/footer.php';
}

    function addProduct(){
        //VALIDAR DATOS
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        
        insertProduct($name, $description, $price, $img);
        header('Location: ' . BASE_URL);
    }

    function removeProduct($id){
        deleteProduct($id);
        header('Location: ' . BASE_URL);
    }

    function modifyProduct($id){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $img = $_POST['img'];

        updateProduct($id,$name, $description, $price, $img);

    }
?>
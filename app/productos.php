<?php
  
require_once "product_db.php";


function getProducto(){
    require_once 'templates/header.php';
    $products = getProducts();

?>
    <?php
        session_start();
        $username = 'usuario'; 
        if(isset($_SESSION['user'])){
            $username = $_SESSION['tipouser'];
            if($username == 'administrador'){
    ?>

    <main class="grid-main-products">
    <?php

require_once "./app/category_db.php";
$categories = getCategory();
?>

<div class="form-products">
        <form action="addProduct" method="post">
            <label>Producto</label>
            <input class="" name="name" type="text">
            <label>Categoria</label>
            <select name="category" id="">
                <?php foreach($categories as $category) {?>
                    <option value="<?php echo $category->id_category?>"><?php echo $category->category ?></option> 
                <?php } ?>
            </select>
            <label>Descripcion</label>
            <input class="" name="description" type="text">
            <label>Precio</label>
            <input class="" name="price" type="number">
            <label>Imagen</label>
            <input type="text" name="img" placeholder="Inserte link de la imagen">
            <button type="submit">ENVIAR</button>
        </form>

</div>
        <?php
            }
        }
        ?>
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
                    <div class="description-product"><p><?php echo $product->category ?></p></div>
                    <div class="description-product"><p><?php echo $product->description ?></p></div>
                    <div class="price-product"><p><?php echo $product->price ?></p></div>
                    <div class="buttons-container">
                        <?php if($username == 'administrador'){ ?>
                        <div><button><a href="delProduct/<?php echo $product->id_product?>">BORRAR</a></button></div>
                        <?php } ?>
                        <div class="form-products posicion ocultar">
                                <form action="editar/<?php echo $product->id_product?>" method="POST">
                                    <label>Producto</label>
                                    <input class="" name="name" type="text">
                                    <label>Categoria</label>
                                    <select name="category" id="">
                                        <?php foreach($categories as $category) {?>
                                            <option value="<?php echo $category->id_category?>"><?php echo $category->category ?></option> 
                                        <?php } ?>
                                    </select>
                                    <label>Descripcion</label>
                                    <input class="" name="description" type="text">
                                    <label>Precio</label>
                                    <input class="" name="price" type="number">
                                    <label>Imagen</label>
                                    <input type="text" name="img" placeholder="Inserte link de la imagen">
                                    <button type="submit">ENVIAR</button>
                                      
                                </form>
                                <button class="cerrar">Cerrar</button>     
                        </div>
                        <?php if($username == 'administrador'){ ?>                 
                        <button class="modify">Editar</button>
                        <?php } ?>   
                    </div>
                </div>
            </div>
            <?php
                } 
            ?>   
        </div>
        <?php 
            if(isset($_SESSION['user'])){ ?>
        <a href="logout">salir</a>
        <?php } ?>
    </main>

<?php
    require_once 'templates/footer.php';
}

    function addProduct(){
        if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['img']) && isset($_POST['category'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $img = $_POST['img'];
            $category = $_POST['category'];
            insertProduct($name, $description, $price, $img, $category );
            header('Location: ' . BASE_URL);
        }
    }

    function removeProduct($id){
        deleteProduct($id);
        header('Location: ' . BASE_URL);
    }

    function modifyProduct($id){
        if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['img']) && isset($_POST['category'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $img = $_POST['img'];
            $category = $_POST['category'];
            var_dump($name, $description, $price, $img, $category);
            updateProduct($id, $name, $description, $price, $img, $category);
            
        }
    }

?>
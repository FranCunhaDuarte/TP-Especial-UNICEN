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
        <form action="addProduct" method="post" enctype="multipart/form-data">
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
            <input type="file" name="img" placeholder="Inserte link de la imagen">
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
                <div class="container-description">
                    <div class="data-container">
                        <span>$<?php echo $product->price ?></span>
                        <p><?php echo $product->name ?></p>
                        <p><?php echo $product->description ?></p>
                    </div>
                    <div class="description-product"><p><?php echo $product->category ?></p></div>
                    <div class="buttons-container">
                        <?php if($username == 'administrador'){ ?>
                        <button class="delButton"><a href="delProduct/<?php echo $product->id_product?>">BORRAR</a></button>
                        <?php } ?>
                        <div class="form-edit-products posicion ocultar">
                                <form action="editar/<?php echo $product->id_product?>" method="POST" enctype="multipart/form-data">
                                    <div>
                                        <label>Producto</label>
                                        <input class="" name="name" type="text">
                                    </div>
                                    <div>
                                        <label>Categoria</label>
                                        <select name="category" id="">
                                            <?php foreach($categories as $category) {?>
                                                <option value="<?php echo $category->id_category?>"><?php echo $category->category ?></option> 
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div>
                                        <label>Descripcion</label>
                                        <input class="" name="description" type="text">
                                    </div>
                                    <div>
                                        <label>Precio</label>
                                        <input class="" name="price" type="number">
                                    </div>
                                    <div>
                                        <label>Imagen</label>
                                        <input type="file" name="img" placeholder="Inserte link de la imagen">
                                    </div>
                                    <button type="submit">EDITAR</button>
                                </form>
                                <button class="cerrar">X</button>
                        </div>
                        <?php if($username == 'administrador'){ ?>                 
                        <button class="modify">EDITAR</button>
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
        <button class="log-out-button"><a href="logout">Cerrar Sesion</a></button>
        <?php } ?>
    </main>

<?php
    require_once 'templates/footer.php';
}

    function addProduct(){
        if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['category'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $img = $_FILES['img'];
            $category = $_POST['category'];
            if($_FILES['img']['type']){
                if($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png" ) {
                    insertProduct($name, $description, $price, $_FILES['img'], $category );
                    header('Location: ' . BASE_URL);    
                }
        }
        header('Location: ' . BASE_URL); 
        }
    }

    function removeProduct($id){
        deleteProduct($id);
        header('Location: ' . BASE_URL);
    }

    function modifyProduct($id){
        if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['category'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $img = $_POST['img'];
            $category = $_POST['category'];
            if($_FILES['img']['type']){
                if($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png" ) {
                    updateProduct($id,$name, $description, $price, $_FILES['img'], $category );
                    header('Location: ' . BASE_URL);    
                }
        }
        header('Location: ' . BASE_URL); 
        }
    }

?>
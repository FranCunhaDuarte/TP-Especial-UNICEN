<?php
  
require_once "product_db.php";


function getProducto(){
    require_once 'templates/header.php';
    $products = getProducts();

?>
    <?php
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
            <input class="" name="name" type="text" maxlength="25">
            <label>Categoria</label>
            <select name="category" id="">
                <?php foreach($categories as $category) {?>
                    <option value="<?php echo $category->id_category?>"><?php echo $category->category ?></option> 
                <?php } ?>
            </select>
            <label>Descripcion</label>
            <input class="" name="description" type="text" maxlength="50">
            <label>Precio</label>
            <input class="" name="price" type="number" maxlength="50">
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
                                        <input class="" name="name" type="text" value="<?php echo $product->name ?>" maxlength="25">
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
                                        <input class="" name="description" type="text" value="<?php echo $product->description ?>" maxlength="50">
                                    </div>
                                    <div>
                                        <label>Precio</label>
                                        <input class="" name="price" type="number" value="<?php echo $product->price ?>" maxlength="50">
                                    </div>
                                    <div>
                                        <label>Imagen</label>
                                        <input type="file" name="img" placeholder="Inserte link de la imagen" value="<?php echo $product->img?>">
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
    </main>

<?php
    require_once 'templates/footer.php';
}

    function addProduct(){
        if(isset($_POST['name']) && strlen($_POST['name']) <= 25 && isset($_POST['description']) && strlen($_POST['description']) <= 50 && isset($_POST['price']) && $_POST['price'] >0 && isset($_POST['category'])){
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
        if(isset($_POST['name']) && strlen($_POST['name']) <= 25 && isset($_POST['description']) && strlen($_POST['description']) <= 50 && isset($_POST['price']) && $_POST['price'] >0 && isset($_POST['category'])){
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
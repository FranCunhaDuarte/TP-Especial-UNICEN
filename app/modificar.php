<?php 
    $id = $_GET['id'];
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
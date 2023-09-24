<?php

    require_once "config.php";

    function getProducts(){
        $db = connection();
        $query = $db->prepare("SELECT product.*, category.* FROM product INNER JOIN category ON(product.id_category_fk = category.id_category) ORDER BY category");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ); 
        return $products;  
    }
    
    function getProduct($id){
        $db = connection();
        $query = $db->prepare("SELECT * FROM product WHERE id_product = ?");
        $query->execute(array($id));
        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }

    function insertProduct($name, $description, $price,$img, $id_category_fk){
        $pathImg= null;
        if ($img){
            $pathImg = uploadImage($img);
        }
        $db = connection();
        $query = $db->prepare('INSERT INTO product (name, description, price, img, id_category_fk) VALUES(?,?,?,?,?)');
        $query->execute(array($name,$description,$price,$pathImg, $id_category_fk));
    }

    function uploadImage($image){
        $target = "img/" . uniqid() . "." . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($image['tmp_name'], $target);
        return $target;
    }

    function deleteProduct($id){
        $db = connection();
        $query = $db->prepare('DELETE FROM product WHERE id_product=?');
        $query->execute(array($id));
    }
    
    function updateProduct($id, $name, $description, $price, $img, $id_category_fk){
        $db = connection();
        $query = $db->prepare('UPDATE product SET name = ?, description = ?, price = ?, img =?, id_category_fk=? WHERE product.id_product = ?');
        $query->execute(array($name, $description, $price, $img, $id_category_fk, $id));
    }
      
?>
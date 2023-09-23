<?php
    function connection(){
        return $db = new PDO('mysql:host=localhost;dbname=tecnomundo;charset=utf8', 'root', '');
    }

    function getProducts(){
        $db = connection();
        $query = $db->prepare("SELECT * FROM product");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ); 
        return $products;  
    }

    function insertProduct($name, $description, $price,$img){
        $db = connection();
        $query = $db->prepare('INSERT INTO product (name, description, price, img) VALUES(?,?,?,?)');
        $query->execute(array($name,$description,$price,$img));
    }

    function deleteProduct($id){
        $db = connection();
        $query = $db->prepare('DELETE FROM product WHERE id_product=?');
        $query->execute(array($id));
    }
    
    function updateProduct($id,$name, $description, $price, $img){
        $db = connection();
        $query = $db->prepare('UPDATE product SET name = ?, description = ?, price = ?, img =? WHERE id_product = ?');
        $query->execute(array($id,$name, $description, $price, $img));
    }
      
?>
<?php
     require_once "config.php";


     function getCategory(){
            $db = connection();
            $query = $db->prepare("SELECT * FROM category");
            $query->execute();
            $category = $query->fetchAll(PDO::FETCH_OBJ); 
            return $category;  
     }
?>
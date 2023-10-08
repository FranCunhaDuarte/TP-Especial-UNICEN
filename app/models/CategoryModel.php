<?php

     class CategoryModel{

          private $db;

          function __construct(){
               $this->db = connection();
          }

          public function getCategory(){
               $query = $this->db->prepare("SELECT * FROM category");
               $query->execute();
               $category = $query->fetchAll(PDO::FETCH_OBJ); 
               return $category;  
          }
     }
?>
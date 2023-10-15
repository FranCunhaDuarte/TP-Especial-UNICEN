<?php

     class CategoriesModel{

          private $db;

          function __construct(){
               $this->db = connection();
          }

          public function getCategoryJoin(){
               $query= $this->db->prepare( "SELECT * FROM product JOIN category ON product.id_category_fk = category.id_category");
               $query->execute();
               $categoryjoin = $query->fetchAll(PDO::FETCH_OBJ); 
               return $categoryjoin;
          }
          public function getCategory(){
               $query= $this->db->prepare( "SELECT * FROM category");
               $query->execute();
               $category = $query->fetchAll(PDO::FETCH_OBJ); 
               return $category;
          }

          public function countProductsByCategory($id){
               $query= $this->db->prepare( "SELECT COUNT(*) AS product_count FROM product WHERE id_category_fk = ?");
               $query->execute(array($id));
               $count = $query->fetchColumn();
               return $count;
          }

          function addCategory($newCategory){
               $query = $this->db->prepare('INSERT INTO category (category) VALUES (?)');
               $query->execute(array($newCategory));
           }

          public function deleteCategory($id){
               $query = $this->db->prepare('DELETE FROM category WHERE id_category=?');
               $query->execute(array($id));
          }

          public function updateCategory($id,$category){
               $query = $this->db->prepare('UPDATE category SET category=? WHERE category.id_category = ?');
               $query->execute(array($id, $category));
          }
     }
?>
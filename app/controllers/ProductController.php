<?php

    require_once './app/models/CategoryModel.php';
    require_once './app/models/ProductModel.php';
    require_once './app/view/ProductView.php';

  class ProductController{
    private $model;
    private $modelc;
    private $view;
    private $user;

    public function __construct(){
        $this->model = new ProductModel();
        $this->modelc = new CategoryModel();
        $this->view = new ProductsView();
        //$this->user = new UserController();
    
    }

    public function getProducts(){
        $products = $this->model->getProducts();
        $categories = $this->modelc->getCategory();
        $this->view-> showProducts($products, $categories);
    }

    public function getProduct($id){
        $product = $this->model->getProduct($id);
        $this->view-> showProduct($product);
    }

    public function addProduct(){
        if(isset($_POST['name']) && strlen($_POST['name']) <= 25 && isset($_POST['description']) && strlen($_POST['description']) <= 50 && isset($_POST['price']) && $_POST['price'] >0 && isset($_POST['category'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            if($_FILES['img']['type']){
                if($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png" ) {
                    $this->model->insertProduct($name, $description, $price, $_FILES['img'], $category );
                    header('Location: ' . BASE_URL);
                }
        }
        header('Location: ' . BASE_URL); 
        }
    }

    public function removeProduct($id){
        $this->model->deleteProduct($id);
        header('Location: ' . BASE_URL);
    }

    public function modifyProduct($id){
        if(isset($_POST['name']) && isset($_POST['name']) <= 25 && isset($_POST['description']) && isset($_POST['description']) <= 50 && isset($_POST['price']) && $_POST['price'] >0 && isset($_POST['category'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            if($_FILES['img']['type']){
                if($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png" ) {
                    $this->model->updateProduct($id,$name, $description, $price, $_FILES['img'], $category );
                    header('Location: ' . BASE_URL);    
                }
        }
        header('Location: ' . BASE_URL); 
        }
    }
  }
?>
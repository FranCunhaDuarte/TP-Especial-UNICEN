<?php

    require_once './app/models/CategoriesModel.php';
    require_once './app/models/ProductModel.php';
    require_once './app/view/ProductView.php';

  class ProductController{
    private $model;
    private $modelc;
    private $view;
    private $user;

    public function __construct(){
        $this->model = new ProductModel();
        $this->modelc = new CategoriesModel();
        $this->view = new ProductsView();
    
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
        if(UserHelper::checkSession()){
            if(!empty($_POST['name']) && strlen($_POST['name']) <= 50 && !empty($_POST['description']) && !empty($_POST['price']) && $_POST['price'] >0 && !empty($_POST['category'])){
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                if($_FILES['img']['type']){
                    if($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png") {
                        $this->model->insertProduct($name, $description, $price, $_FILES['img'], $category );
                        header('Location: ' . URL_PRODUCT);
                    }
                }
            }else{
                $error_message = "Verificar los campos";
                header('Location: ' . URL_PRODUCT . '?error=' . urlencode($error_message));
            }   
        }
    }

    public function removeProduct($id){
        if(UserHelper::checkSession()){
            $this->model->deleteProduct($id);
            header('Location: ' . URL_PRODUCT);
        }else{
            header('Location: ' . URL_PRODUCT);
        }
    }

    public function modifyProduct($id){
        if(UserHelper::checkSession()){
            if(isset($_POST['name']) && isset($_POST['name']) <= 50 && isset($_POST['description']) && isset($_POST['description']) <= 50 && isset($_POST['price']) && $_POST['price'] >0 && isset($_POST['category'])){
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                if($_FILES['img']['type']){
                    if($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png" ) {
                        $this->model->updateProduct($id,$name, $description, $price, $_FILES['img'], $category );
                        header('Location: ' . URL_PRODUCT);
                    } 
                } else{
                    $this->model->updateProduct($id,$name, $description, $price, null , $category );
                    header('Location: ' . URL_PRODUCT);
                }
            }
        }
    header('Location: ' . URL_PRODUCT); 
}


    // INDEX 

    public function getIndex(){
        $products = $this->model->getProducts();
        $this->view->showIndex($products);
    }
  }
?>
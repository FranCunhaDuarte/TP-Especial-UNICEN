<?php

    require_once './app/models/CategoriesModel.php';
    require_once './app/view/CategoriesView.php';
    require_once './app/view/ProductView.php';

  class CategoriesController{
    private $model;
    private $view;
    private $viewp;

    public function __construct(){
      $this->model = new CategoriesModel();
      $this->view = new CategoriesView();
      $this->viewp = new ProductsView();
    }

    public function filterCategories(){
      $id = $_POST['selectCategory'];
      $products=$this->model->getProductsByCategory($id);
      $categories=$this->model->getCategory();
      $this->viewp-> showProducts($products, $categories);
    }

    public function getCategories(){
      $categories=$this->model->getCategory();
      $this->view->showCategories($categories);
    }



    public function addCategory(){
      if(UserHelper::checkSession()){
        if(isset($_POST['newCategory']) && !empty($_POST['newCategory'])){
            $newCategory = strtolower($_POST['newCategory']);
            $this->model->addCategory($newCategory);
            header('Location: ' . URL_CATEGORIES);
          }
      } else {
        header('Location: ' . URL_CATEGORIES);
      }
    }
    
    public function removeCategory($id){
      if(UserHelper::checkSession()){
        $countPrduct=$this->model->countProductsByCategory($id);
        if($countPrduct!=0){
          $this->view->showError();
        } else{
          $this->model->deleteCategory($id);
          header('Location: ' . URL_CATEGORIES);
        }
      }else {
        header('Location: ' . URL_CATEGORIES);
      }
    }
    
    public function updateCategory($id){
      if(UserHelper::checkSession()){
        if(isset($_POST['categoryName']) && !empty($_POST['categoryName'])){
          $category = strtolower($_POST['categoryName']);
          $this->model->updateCategory($id,$category);
          header('Location: ' . URL_CATEGORIES);
        } else{
          $error_message = "Completar el campo";
          header('Location: ' . URL_CATEGORIES . '?error=' . urlencode($error_message));
        }
      } else{
        header('Location: ' . URL_CATEGORIES);
      }
    }


  }
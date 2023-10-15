<?php

    require_once './app/models/CategoriesModel.php';
    require_once './app/view/CategoriesView.php';

  class CategoriesController{
    private $model;
    private $view;

    public function __construct(){
      $this->model = new CategoriesModel();
      $this->view = new CategoriesView();
    }

    public function getCategories(){
      $categoriesjoin=$this->model->getCategoryJoin();
      $categories=$this->model->getCategory();
      $this->view->showCategories($categoriesjoin,$categories);
    }

    public function getCategories1($id){
      if($id==null){
        $categoriesjoin=$this->model->getCategoryJoin();
        $categories=$this->model->getCategory();
        $this->view->showCategories($categoriesjoin,$categories);
      } else{
        $categoriesjoin=$this->model->getCategoryJoin();
        $categories=$this->model->getCategory();
        $categories1=$this->model->countProductsByCategory($id);
        $this->view->showCategories1($categoriesjoin,$categories,$categories1);
      }
    }



    public function addCategory(){
      if(isset($_POST['newCategory'])){
          $newCategory = $_POST['newCategory'];
          $this->model->addCategory($newCategory);
          header('Location: ' . URL_CATEGORIES);
        }
      header('Location: ' . URL_CATEGORIES); 
    }
    
    public function removeCategory($id){
      $countPrduct=$this->model->countProductsByCategory($id);
      if($countPrduct!=0){
        $this->view->showError();
      } else{
        $this->model->deleteCategory($id);
        header('Location: ' . URL_CATEGORIES);
      }
      header('Location: ' . URL_CATEGORIES);
    }
    
    public function updateCategory($id){
      if(isset($_POST['category'])){
        $category = $_POST['category'];
        $this->model->updateCategory($id,$category);
        var_dump($id,$category);
        //header('Location: ' . URL_CATEGORIES);    
      }
      //header('Location: ' . URL_CATEGORIES); 
    }


  }
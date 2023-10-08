<?php 
    require_once './app/models/UserModel.php';
    require_once './app/view/UserView.php';
    require_once './app/helper/UserHelper.php';

     class UserController{

        private $model;
        private $view;
    
        function __construct(){
            $this->model = new UserModel();
            $this->view = new UserView();
        }
    
        public function showLogin(){
            if(UserHelper::checkSession()){
                header('Location: ' . URL_PRODUCT);
            }
            else{
                $this->view->showLogin();
            }
  
        }
        
        public function registerUser(){
            //VALIDAR DATOS
            $name = $_POST['fullname'];
            $user = $_POST['user'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this->model->insertUser($name, $user, $email, $hash);
            header('Location: ' . URL_LOGIN);
        }


        public function loginIn(){
            $usuario = $_POST['user'];
            $password = $_POST['password'];
            $user = $this->model->getUser($usuario);
            if(isset($user) && $user != null && password_verify($password, $user->password)){
                UserHelper::login($user);
                header('Location: ' . URL_PRODUCT);
            }else{
                header('Location: ' . URL_LOGIN);
            }
        }
        
    }


?>
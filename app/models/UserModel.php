<?php

    class UserModel{

        private $db;

        function __construct(){
            $this->db = connection();
        }

        function insertUser($name, $user, $email, $password){
            $query = $this->db->prepare('INSERT INTO user (fullname, user, email, password) VALUES(?,?,?,?)');
            $query->execute(array($name,$user,$email,$password));
        }

        function getUser($usuario){
            $query= $this->db->prepare( "SELECT * FROM user WHERE user = ?");
            $query->execute(array($usuario));
            $user = $query->fetch(PDO::FETCH_OBJ);
            return $user;
        }
    }
?>
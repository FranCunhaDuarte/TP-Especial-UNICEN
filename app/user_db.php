<?php
    require_once "config.php";

    function insertUser($name, $user, $email, $password){
        $db = connection();
        $query = $db->prepare('INSERT INTO user (fullname, user, email, password) VALUES(?,?,?,?)');
        $query->execute(array($name,$user,$email,$password));
    }

    function getPassword($usuario){
        $db = connection();
        $query= $db->prepare( "SELECT * FROM user WHERE user = ?");
        $query->execute(array($usuario));
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

?>
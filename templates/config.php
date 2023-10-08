<?php

function connection(){
    return $db = new PDO('mysql:host=localhost;dbname=tecnomundo;charset=utf8', 'root', '');
}


?>


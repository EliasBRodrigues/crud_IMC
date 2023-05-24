<?php
function newConnect($dtb = "valores"){
    $serv = "127.0.0.1:3306";
    $user = "root";
    $pass = "";

    $conn = new mysqli($serv, $user, $pass, $dtb);
    if(!$conn){
        die("Error".mysqli_connect_error());
    }

    return $conn;
}
    
?>
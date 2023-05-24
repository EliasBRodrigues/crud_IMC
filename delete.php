<?php
    require_once('conn.php');
    $conn = newConnect();
    $id = $_GET['id'];
    $sql = "DELETE FROM `cadastros` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location: index.php?msg=Usuário Deletado");
    } else {
        echo "fail". mysqli_error($conn);
    }
?>
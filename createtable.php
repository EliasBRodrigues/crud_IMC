<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create table</title>
</head>
<body>
    <h1>create table</h1>
    <?php
        require_once("conn.php");

        $sql = " CREATE TABLE IF NOT EXISTS cadastros 
        (   id int(02) primary key auto_increment,
            nome varchar(50),
            nasc date,
            peso float,
            altura float,
            imc float
            )";
        $conn = newConnect();

        $result = $conn->query($sql);

        if($result){
            echo "all right table";
        } else {
            echo "not right table".$conn->error;
        }
        $conn -> close();
    ?>
</body>
</html>
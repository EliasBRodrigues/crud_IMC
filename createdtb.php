<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create DTB</title>
</head>
<body>
    <h1>database</h1>
    <?php
        require_once("conn.php");
        $conn = newConnect(null);
        $sql = 'CREATE DATABASE IF NOT EXISTS valores';
        $result = $conn -> query(($sql));

        if($result){
            echo "all right database";
        } else {
            echo "not right database";
        }

        $conn -> close();
    ?>
</body>
</html>
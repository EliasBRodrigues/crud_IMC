<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>Table</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mt-5 mb-5" style="background-color: white;">PHP CRUD</nav>

    <div class="container">
        <?php
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                '.$msg.'
            </div>';
            }
        ?>
        <a href="forms.php" class="btn btn-dark mb-3">Adicionar Usário</a>
        <table class="table table-hover text-center">
        <thead class="table-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Nascimento</th>
            <th scope="col">Peso</th>
            <th scope="col">Altura</th>
            <th scope="col">IMC</th>
            <th scope="col">Categoria</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once("conn.php");
                $conn = newConnect();
                $sql = "SELECT * FROM cadastros";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                
            <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['nome'] ?></td>
            <td><?php echo $row['nasc'] ?></td>
            <td><?php echo $row['peso'] ?></td>
            <td><?php echo $row['altura'] ?></td>
            <td><?php echo $row['imc'] ?></td>
            <td>
                <?php
                    $imc_value = floatval(($row['imc']));
                    
                    if($imc_value <= 0){
                        echo "Digite um valor válido";
                    } else if($imc_value < 16){
                        echo "Baixo Peso Muito Grave";
                    } else if($imc_value == 16 || $imc_value <= 16.99){
                        echo "Baixo Peso Grave(Magreza)";
                    } else if($imc_value == 17 || $imc_value <= 18.49){
                        echo "Baixo Peso(Magreza)";
                    } else if($imc_value == 18.50 || $imc_value <= 24.99){
                        echo "Peso Normal";
                    } else if($imc_value == 25 || $imc_value <= 29.99){
                        echo "Sobrepeso";
                    } else if($imc_value == 30 || $imc_value <= 34.99){
                        echo "Obesidade I";
                    } else if($imc_value == 35 || $imc_value <= 39.99){
                        echo "Obesidade II";
                    } else if($imc_value >= 40){
                        echo "Obesidade III";
                    } 
                ?>
            </td>
            <td>
                <a href="update.php?id=<?php echo base64_encode($row['id'])?>" class="link-dark"><i class="bi bi-pencil-square"></i></a> 
                
                <a href="delete.php?id=<?php echo $row['id']?>"  class="link-dark"><i class="bi bi-trash-fill"></i></a>
            </td>
            </tr>
                    <?php
                }
                
            ?>
        </tbody>
        </table>
        </div>
</body>
</html>
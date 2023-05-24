<?php
     require_once("conn.php");
     $conn = newConnect();
     if(isset($_POST['submit'])) {
            $name = $_POST['nome'];
            $year = $_POST['nasc'];
            $weight = $_POST['peso'];
            $height = $_POST['altura'];
            $imc = ($weight/pow($height, 2) * 10000);

            $sql = "INSERT INTO `cadastros`(`id`, `nome`, `nasc`, `peso`, `altura`, `imc`) VALUES (null, '$name','$year','$weight','$height', '$imc')";

            $result = mysqli_query($conn, $sql);

            if($result){
                header("location: index.php?msg=Cadastro realizado com sucesso!");
            } else {
                echo "fail". mysqli_error($conn);
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Forms PHP</title>
</head>
<body>
    
    <nav class="navbar navbar-light justify-content-center fs-3 mt-5 mb-5" style="background-color: white;">PHP CRUD</nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Adicionar Usuário</h3>
            <p class="text-muted">Formulário</p>
        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 20vw; min-width:300px">
                <div class="col">
                    <div class="col">
                            <label class="form-label" for="nome">Nome</label>
                            <input class="form-control" id="nome" type="text" name="nome" required>
                            <br>

                            <label class="form-label" for="nasc">Data de Nascimento</label>
                            <input class="form-control" id="nasc" type="date" name="nasc" required>
                            <br>
                    </div>
                         <div class="col">
                            <label class="form-label" for="peso">Peso</label>
                            <input class="form-control" id="peso" type="number" name="peso" required>

                            <br>

                            <label class="form-label" for="altura">Altura</label>
                            <input class="form-control" id="altura" type="number" name="altura" required>
                     </div>
                            <br>
                            
                    <div>
                        <button class="btn btn-success" type="submit" name="submit">Cadastrar</button>
                        <a href="index.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
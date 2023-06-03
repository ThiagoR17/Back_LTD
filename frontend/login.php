<?php
include ('conexao.php');

if (isset($_POST['email']) || isset($POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu email";
    } else if (strlen($_POST['senha']) == 0) {
        echo"Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM login WHERE email = '$email'  AND Senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" .$mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)){
                session_start();
            }

            $_SESSION['user'] = $usuario['email'];


            header("Location : index.php");


    

        } else {
            echo "Falha ao logar! Email ou senha incorretos";
        }
    }
    

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Login</title>
     <!-- Favicon -->
    <link rel="shortcut icon" href="images/ltd-favicon.png" type="image/x-icon"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="styles/login.css"/>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Space+Grotesk:wght@700&family=Yellowtail&display=swap" rel="stylesheet">
    <script src="" defer></script>
</head>
<body>
    <div class="caixa">
        <header>
            <img src="images/NID-banner.png" alt="NID-banner">
            <hr>
        </header>

        <div class="formulario">
            <div class="mt-4">
                <p class="h1 text-center">LOGIN</p>  
            </div>

            <form class="mt-4"  action="" method="POST">
                <div class="form-outline mb-4 h5">
                    <label class="form-label" for="form2Example1">Usuário</label>
                    <input type="email" name="email" id="form2Example1" class="form-control rounded-pill" />
                </div>
              
                <div class="form-outline mb-4 h5">
                    <label class="form-label" for="form2Example2">Senha</label>
                    <input type="password" name= "senha" id="form2Example2" class="form-control rounded-pill" />
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success rounded-pill btn-lg px-5">Entrar</button>
                </div>
            </form>
        </div>
    </div>   
</body>
</html>


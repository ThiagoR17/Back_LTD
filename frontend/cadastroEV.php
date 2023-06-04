<?php

include('conexao.php');



$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (".$mysqli->connect_errno.") ".$mysqli->connect_errno;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["Evento_nome"];
    $data = $_POST["Data"];
    $horario = $_POST["Horario"];
    $Sala = $_POST["Sala"];
    $Status =$_POST["Status"];

  
    // Prepara a consulta SQL
    $sql = "INSERT INTO eventos (Evento_nome, Data, horario, Sala, Status) VALUES (?, ?, ?, ?, ?)";

    // Prepara a declaração
    $stmt = $mysqli->prepare($sql);

    // Vincula os parâmetros
    $stmt->bind_param("sssss", $nome, $data,  $horario, $Sala, $Status);

    // Executa a consulta
    if ($stmt->execute()) {
        echo "Evento cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o evento: ".$stmt->error;
    }

    // Fecha a declaração
    $stmt->close();
}




?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Evento</title>
</head>
<body>
    <h1>Cadastro de Evento</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nome">Nome do Evento:</label>
        <input type="text" name="Evento_nome" required><br><br>

        <label for="data">Data do Evento:</label>
        <input type="date" name="Data" required><br><br>
        <label for="horario">Horario:</label>
        <input type="Time" name = Horario required><br><br>
        <label for = "Sala">Sala:</label>
        <input type="text" name = Sala required><br><br>
        <label for = "Status">Status de Confirmação:</label>
        <input type = "text" name = Status required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>











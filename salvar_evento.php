<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "estoque"; 

    // Cria a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Obtém os dados do formulário
    $nome_evento = $_POST["nome_evento"];
    $data_evento = $_POST["data_evento"];
    $horario_evento = $_POST["horario_evento"];

    // Prepara e executa a query SQL para inserir o evento no banco de dados
    $sql = "INSERT INTO eventos (nome_evento, data_evento, horario_evento) VALUES ('$nome_evento', '$data_evento', '$horario_evento')";
    if ($conn->query($sql) === TRUE) {
        header("Location: Cadastroevento.php");
        exit();
    } else {
        echo "Erro ao cadastrar peça: " . $conn->error;
    }
    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>

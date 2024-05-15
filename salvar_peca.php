
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    var_dump($_POST);
 
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "estoque";
    
    $codigo = $_POST["codigo"];
    $nome_peca = $_POST["nome_peca"];
    $fornecedor = $_POST["fornecedor"];
    $valor_compra = $_POST["valor_compra"];
    $valor_venda = $_POST["valor_venda"];
    $quantidade = $_POST["quantidade"];

    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

  
    $sql = "INSERT INTO pecas (codigo,nome_peca, fornecedor, valor_compra, valor_venda, quantidade) VALUES ('$codigo','$nome_peca', '$fornecedor', '$valor_compra', '$valor_venda', '$quantidade')";
    if ($conn->query($sql) === TRUE) {
     
        header("Location: cadastro_pecas.php");
        exit();
    } else {
        echo "Erro ao cadastrar peça: " . $conn->error;
    }
    
   
    $conn->close();
}

?>

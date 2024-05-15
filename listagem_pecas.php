<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Peças</title>
    <link rel="stylesheet" href="css/listaPecas.css">
</head>
<body>

<div class="login-box">

  <h2>Listagem de Peças</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>codigo</th>
      <th>Nome da Peça</th>
      <th>Fornecedor</th>
      <th>Valor de Compra</th>
      <th>Valor de Venda</th>
      <th>Quantidade</th>
    </tr>
    <!-- coloca ação"rodrigo lembra" listagem das peças -->
    <?php
        
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "estoque";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
       
        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }
        
        
        $sql = "SELECT * FROM pecas";
        $result = $conn->query($sql);
        
       
        if ($result !== false && $result->num_rows > 0) {
         
            while ($row = $result->fetch_assoc()) {
                echo "<tr data-id='" . $row["id"] . "'>"; 
                echo "<td>" . $row["id"] . "</td>"; 
                echo "<td>" . $row["codigo"] . "</td>"; 
                echo "<td>" . $row["nome_peca"] . "</td>";
                echo "<td>" . $row["fornecedor"] . "</td>";
                echo "<td>" . $row["valor_compra"] . "</td>";
                echo "<td>" . $row["valor_venda"] . "</td>";
                echo "<td>" . $row["quantidade"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhuma peça cadastrada.</td></tr>";
        }
        
       
        $conn->close();
    ?>
  </table>
  <a href="cadastro_pecas.php" class="back-button">Voltar para Cadastro</a>
  <a href="telaVenda.php" class="back-button">Ir para Tela de venda</a>
</div>
<div class="credit">
  Feito por Natanael Maia
</div>

</body>
</html>

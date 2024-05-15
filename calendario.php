<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "estoque"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta SQL para recuperar os eventos do banco de dados
$sql = "SELECT id, nome_evento, data_evento, horario_evento FROM eventos";
$result = $conn->query($sql);

// Array para armazenar os eventos formatados
$events = [];

// Verifica se existem eventos e formata-os corretamente
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $events[] = [
            'id' => $row['id'],
            'title' => $row['nome_evento'],
            'start' => $row['data_evento'] . 'T' . $row['horario_evento'] // Combina data e horário
        ];
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html lang='pt-br'>
  <head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="css/calendar.css">

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: <?php echo json_encode($events); ?> // Passa os eventos para o calendário
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div class="login-box">
      <a href="cadastroevento.php" class="back-button">Voltar </a>
    </div>
    <div id='calendar'></div>

  </body>
</html>

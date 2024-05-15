<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Eventos</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>

  <div class="login-box">
    <h2>Cadastro de Eventos</h2>
  
    <form action="salvar_evento.php" method="POST">
      <div class="user-box">
        <input type="text" name="nome_evento" required="">
        <label>Nome do Evento</label>
      </div>
      <div class="user-box">
        <input type="date" name="data_evento" required="">
        <label>Data do Evento</label>
      </div>
      <div class="user-box">
        <input type="time" name="horario_evento" required="">
        <label>Horário do Evento</label>
      </div>
      <button type="submit" class="login-button">Cadastrar Evento</button>
    </form>
    <a href="telainicio.php" class="back-button">Voltar </a>
    <a href="calendario.php" class="back-button">Ir para o Calendário</a>
  </div>
  <div class="credit">
    Feito por Natanael Maia
  </div>
</body>

</html>

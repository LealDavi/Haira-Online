<?php require_once "validador_acesso.php";

    $pontos_time1 = $_COOKIE["pontos_time1"];
    $pontos_time2 = $_COOKIE["pontos_time2"];

    $nome_clube1 = $_COOKIE["clube1"];
    $nome_clube2 = $_COOKIE["clube2"];

    $escudo1 = $_COOKIE["escudo1"];
    $escudo2 = $_COOKIE["escudo2"];

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Haira Online</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="imagens/h_coin.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
        Haira Online
      </a>
      <ul class="navbar-nav">
        <li clas="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="card text-center">
      <div class="card-header">
        Resultado
      </div>
      <div class="card-body">
        <h5 class="card-title">

          <?php 

            echo "<img src='$escudo1' width=100>";
            echo $nome_clube1 . " " . $pontos_time1 ." X ". $pontos_time2 . " " . $nome_clube2;
            echo "<img src='$escudo2' width=100>";
          ?>


        </h5>
        <a href="home.php" class="btn btn-primary">Home</a>
      </div>
      <div class="card-footer text-muted">
        Agora
      </div>
    </div>


  </body>
</html>
<?php require_once "validador_acesso.php";


setcookie("listaNomes", $_COOKIE["listaNomes1"]);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Haira Online</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-home {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
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
   

    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <a href="escolher_adversario.php">
                    <img src="imagens/jogo.jpg" width="300">
                    <p class="text-dark text-center">Desafio</p>

                  </a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <a href="meu_time.php">
                    <img src="imagens/meu_time.jpg" width="300">
                    <p class="text-dark text-center">Meu time</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
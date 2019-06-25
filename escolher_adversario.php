<?php require_once "validador_acesso.php";

    $listaClubes = json_decode($_COOKIE["listaClubes"], true);
    $clube_do_usuario = $_SESSION["clube_do_usuario"];


    $listaClubes = json_decode($_COOKIE["listaClubes"], true);
    print_r($listaClubes);
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Haira Online</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
      .card-adversario {
        padding: 30px 0 0 0;
        width: 350px;
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
        <div class="card-adversario">
          <div class="card">
            <div class="card-header">
              Escolha seu Adversário
            </div>

            <div class="card-body ">
              <div class="container">
                <div class="btn-group-vertical">

                <h2>Disputa</h2>
                <p>Escolha um time adversário para enfrentar</p>
              <?php
                    for ( $i = 0 ; $i < count( $listaClubes ) ; $i++ ) {
                        
                        $clube_atual = $listaClubes[$i]['nome_clube'];

                      if ( $clube_atual == $clube_do_usuario ) {
             
                        $desafiado = $listaClubes[$i]['desafiado'];
                      }
                      if ( $clube_atual != $clube_do_usuario ) {
                        
                        echo "<a class='btn btn-primary' href='carregar_time_adversario.php?adversario=" . $clube_atual . " '>" . $clube_atual . "</a>";
                      }
                    }
                    if ( $desafiado != "0" ) {
                      echo "Você foi desafiado por " . $desafiado;
                    }
                ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
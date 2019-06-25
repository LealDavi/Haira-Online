<?php require_once "validador_acesso.php";
  
  
  $listaJogadores = json_decode($_COOKIE["listaJogadores"], true);
  $listaClubes = json_decode($_COOKIE["listaClubes"], true);

  for ( $i = 0; $i < count( $listaClubes ); $i++ ) {
    
    if ( $listaJogadores[$i]["nome_clube"] == $listaClubes[$i]['nome_clube'] ) {

      $escudo = $listaClubes[$i]['escudo'];
    }
  }
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Haira Online</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-meu-time {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="imagens/h.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
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

        <div class="card-meu-time">
          <div class="card">
            <div class="card-header">
              <?php echo "<img src='" . $escudo . "'width=100>";
                    echo $_SESSION["clube_do_usuario"];

              ?>
            </div>
            
            <div class="card-body">
            <div class="card-columns">
              <?php for ( $i = 0 ; $i < count( $listaJogadores ) ; $i++ ) { 
                
                $foto = $listaJogadores[$i]["foto"];
              
              ?>
                <div class="card" style=" width: 18rem;">
                  <?php
                    echo "<img class='card-img-top' src='$foto' border='0'>";
                  ?>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $listaJogadores[$i]["nome"]; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $listaJogadores["0"]["nome_clube"]; ?></h6>
                  </div>

                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo "Habilidade: " . $listaJogadores[$i]["habilidade"]; ?></li>
                    <li class="list-group-item"><?php echo "Raca: " . $listaJogadores[$i]["raca"]; ?></li>
                    <li class="list-group-item"><?php echo "Capacidade Fisica: " . $listaJogadores[$i]["capacidade_fisica"]; ?></li>
                  </ul>
                </div>
                <br>
                
              <?php } ?>
            </div>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php require_once "validador_acesso.php";

require("conectar_banco_de_dados.php");

function removerJogador($vetor, $valor){

  $chave = array_search($valor, $vetor);

  if($vetor!==false){

      unset($vetor[$chave]);
  }else {
    echo "invalido";
  }
  return $vetor;
}

$jogadores_primeiro_time = array();
$jogadores_segundo_time = array();

$jogadores_primeiro_time = json_decode($_COOKIE["listaNomes"], true);
$jogadores_segundo_time = json_decode($_COOKIE["listaNomes2"], true);

$dados_clube = json_decode($_COOKIE["dados_clube"],true);
$dados_clube2 = json_decode($_COOKIE["dados_clube2"],true);

if( isset($_GET["jogador1"]) && isset($_GET["jogador2"]) && isset($_GET["poder1"]) ) {

  $jogador_primeiro_time = $_GET["jogador1"];
  $jogador_segundo_time = $_GET["jogador2"];
  $poder1 = $_GET["poder1"];
  $poder1 = $dados_clube[$_GET["jogador1"]][$poder1];
  $poder2 = rand(1,3);

  if ($poder2 == 1) {

    $poder2 = $dados_clube2[$jogador_segundo_time]["habilidade"];

  }if ($poder2 == 2) {

    $poder2 = $dados_clube2[$jogador_segundo_time]["raca"];

  }if ($poder2 == 3) {

    $poder2 = $dados_clube2[$jogador_segundo_time]["capacidade_fisica"];

  }

  $pontos_time1 = $_COOKIE["pontos_time1"];
  $pontos_time2 = $_COOKIE["pontos_time2"];

  $pontos_time1 = intval($pontos_time1);
  $pontos_time2 = intval($pontos_time2);

  $resultado_parcial = $poder1 - $poder2;

  if($resultado_parcial > 0) {

    $pontos_time1++;

  }if($resultado_parcial < 0) {

    $pontos_time2++;

  }if ($resultado_parcial == 0) {

    echo "empate";

  }

  $jogadores_primeiro_time = removerJogador($jogadores_primeiro_time, $jogador_primeiro_time);
  $jogadores_segundo_time = removerJogador($jogadores_segundo_time, $jogador_segundo_time);

  $jogadores_primeiro_time = array_values($jogadores_primeiro_time);
  $jogadores_segundo_time = array_values($jogadores_segundo_time);

  if(count($jogadores_primeiro_time) == 0) {

    setcookie("clube1", $dados_clube['nome']);
    setcookie("clube2", $dados_clube2['nome']);

    setcookie("escudo1", $dados_clube['escudo']);
    setcookie("escudo2", $dados_clube2['escudo']);

    $sql = "UPDATE clube SET desafiado='" . $dados_clube['nome'] . "' WHERE nome_clube='" . $dados_clube2['nome'] . "'";
    if (mysqli_query($conn, $sql)) {
    
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

    header("Location: resultado.php");
    die();
  }
  
  setcookie("listaNomes", json_encode($jogadores_primeiro_time));
  setcookie("listaNomes2", json_encode($jogadores_segundo_time));

  setcookie("pontos_time1", $pontos_time1);
  setcookie("pontos_time2", $pontos_time2);

}

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
        Disputa
      </div>
      <div class="card-body">
        <h5 class="card-title">

          <form action="disputa.php">
            <select name="jogador1" size="11">
              <?php
                for ( $i = 0 ; $i < count( $jogadores_primeiro_time ) ; $i++ ){
                  $jog1 = $jogadores_primeiro_time[$i];
                  echo "<option value='$jog1'>$jog1</option>";
              }

              ?>
            </select>
            <select name="jogador2" size="11">
              <?php
                for ( $i = 0 ; $i < count ( $jogadores_segundo_time ) ; $i++ ){
                  $jog2 = $jogadores_segundo_time[$i];
                  echo "<option value='$jog2'>$jog2</option>";
              }

              ?>
            </select>
            <br>
            <br>

            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-secondary">
                <input type="radio" name="poder1" id="habilidade" autocomplete="off" value="habilidade"> Habilidade
              </label>
              <label class="btn btn-secondary">
                <input type="radio" name="poder1" id="raca" autocomplete="off" value="raca"> Raça
              </label>
              <label class="btn btn-secondary">
                <input type="radio" name="poder1" id="capacidade_fisica" autocomplete="off" value="capacidade_fisica"> Capacidade Fisica
              </label>
            </div>
            <br>
            <br>
            <br>
            <button class="btn btn-lg btn-info btn-block" type="submit">Confronto</button>
          </form>
        </h5>
      </div>
    </div>    
  </body>
</html>

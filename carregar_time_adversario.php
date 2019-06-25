<?php 

require_once("validador_acesso.php");
require("jogador.php");
require("clube.php");
require("conectar_banco_de_dados.php");

if( isset($_GET["adversario"])) {
    $adversario = $_GET["adversario"];
}else{
    header("Location: escolher_adversario.php");
}

$sql_selecionar = "SELECT 
        jogadores.nome,
        jogadores.foto,
        jogadores.habilidade,
        jogadores.raca,
        jogadores.raca,
        jogadores.capacidade_fisica,
        clube.nome_clube,
        clube.desafiado,
        clube.escudo
FROM jogadores
INNER JOIN clube
ON jogadores.clube_id_clube = clube.id_clube;";

$sql = "SELECT * FROM clube";

$result_jogadores = mysqli_query($conn, $sql_selecionar);
$result_clube = mysqli_query($conn, $sql);

$listaJogadores = array();
$listaClubes = array();
$listaNomes = array();


if (mysqli_num_rows($result_jogadores) > 0) {

    while($row = mysqli_fetch_assoc($result_jogadores)) {
        if ($row["nome_clube"] == $adversario) {

            $nome = $row["nome"];
            $foto = $row["foto"];
            $habilidade = $row["habilidade"];
            $raca = $row["raca"];
            $capacidade_fisica = $row["capacidade_fisica"];
            $nome_clube = $row["nome_clube"];

            $listaJogadores[] = new Jogador
            (   
                $nome,
                $foto,
                $habilidade,
                $raca,
                $capacidade_fisica,
                $nome_clube
            );
            array_push($listaNomes, $nome);
        }
    }
} else {

    echo "0 results";

}

$listaClubes = json_decode($_COOKIE["listaClubes"], true);

for ( $i = 0 ; $i < count( $listaClubes ) ; $i++ ){
    if ( $listaClubes[$i]["nome_clube"] == $listaJogadores[$i]->getNome_clube()) {
        $nome_escudo = $listaClubes[$i]["escudo"];
    }
}
$clube2 = new Clube($adversario, $nome_escudo, "");

$clube2->setJogador($listaJogadores);
$dados_clube2["nome"] = $adversario;
$dados_clube2["escudo"] = $nome_escudo;

for ( $i = 0 ; $i < 4 ; $i++ ) {
    
    $dados_clube2[$clube2->getJogador($i)->getNome()]["habilidade"] = $clube2->getJogador($i)->getFoto();
    $dados_clube2[$clube2->getJogador($i)->getNome()]["habilidade"] = $clube2->getJogador($i)->getHabilidade();
    $dados_clube2[$clube2->getJogador($i)->getNome()]["raca"] = $clube2->getJogador($i)->getRaca();
    $dados_clube2[$clube2->getJogador($i)->getNome()]["capacidade_fisica"] = $clube2->getJogador($i)->getCapacidade_fisica();

}


setcookie("dados_clube2", json_encode($dados_clube2));
setcookie("listaNomes2", json_encode($listaNomes));
setcookie("jogadores_segundo_time", json_encode($listaJogadores));

setcookie("pontos_time1", "0");
setcookie("pontos_time2", "0");

mysqli_close($conn);
header("Location: disputa.php");

?>
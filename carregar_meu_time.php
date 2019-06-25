<?php require_once "validador_acesso.php";

require("jogador.php");
require("clube.php");

$listaJogadores = array();
$listaJogadores[] = new Jogador("Alisson Becker", "imagens/alisson_becker.png", 1, 1, 1);
$listaJogadores[] = new Jogador("Marcelo", "imagens/marcelo.jpg", 1, 1, 1);
$listaJogadores[] = new Jogador("Daniel Alves", "imagens/daniel_alves.jpg", 1, 1, 1);
$listaJogadores[] = new Jogador("Thiago Silva", "imagens/thiago_silva.jpg", 1, 1, 1);

$clube = new Clube("Brasil", "imagens/brasil.jpg");
$clube->setJogador($listaJogadores);

$dados_clube["nome"] =$clube->getNome();
$dados_clube["escudo"] = $clube->getEscudo();

for ( $i = 0 ; $i < 4 ; $i++ ) {
    
    $dados_clube[$clube->getJogador($i)->getNome()]["foto"] = $clube->getJogador($i)->getFoto();
    $dados_clube[$clube->getJogador($i)->getNome()]["habilidade"] = $clube->getJogador($i)->getHabilidade();
    $dados_clube[$clube->getJogador($i)->getNome()]["raca"] = $clube->getJogador($i)->getRaca();
    $dados_clube[$clube->getJogador($i)->getNome()]["capacidade_fisica"] = $clube->getJogador($i)->getCapFisica();

}

setcookie("dados_clube", json_encode($dados_clube));

$jogadores_primeiro_time = array();

for ( $i = 0 ; $i < 4 ; $i++ ) {

	array_push($jogadores_primeiro_time, $clube->getJogador($i)->nome);
}

setcookie("jogadores_meu_time", implode(",", $jogadores_primeiro_time));
setcookie("jogadores_primeiro_time", implode(",", $jogadores_primeiro_time));
setcookie("pontos_time1", "0");

header("Location: home.php");


?>
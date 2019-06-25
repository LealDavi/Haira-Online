<?php require_once "validador_acesso.php";

require("jogador.php");
require("clube.php");

$listaJogadores = array();
$listaJogadores[] = new Jogador("Alisson Becker", "imagens/alisson_becker.png", 1, 1, 1);
$listaJogadores[] = new Jogador("Marcelo", "imagens/marcelo.jpg", 1, 1, 1);
$listaJogadores[] = new Jogador("Daniel Alves", "imagens/daniel_alves.jpg", 1, 1, 1);
$listaJogadores[] = new Jogador("Thiago Silva", "imagens/thiago_silva.jpg", 1, 1, 1);

$listaJogadores2 = array();
$listaJogadores2[] = new Jogador("Alisson Becker2", "imagens/alisson_becker.png", 2, 2, 2);
$listaJogadores2[] = new Jogador("Marcelo2", "imagens/marcelo.jpg", 2, 2, 2);
$listaJogadores2[] = new Jogador("Daniel Alves2", "imagens/daniel_alves.jpg", 2, 2, 2);
$listaJogadores2[] = new Jogador("Thiago Silva2", "imagens/thiago_silva.jpg", 2, 2, 2);

$clube = new Clube("Brasil", "imagens/brasil.jpg");
$clube2 = new Clube("Brasil2", "imagens/brasil.jpg");

$clube->setJogador($listaJogadores);
$clube2->setJogador($listaJogadores2);

$dados_clube["nome"] =$clube->getNome();
$dados_clube["escudo"] = $clube->getEscudo();

for ( $i = 0 ; $i < 4 ; $i++ ) {
    
    $dados_clube[$clube->getJogador($i)->getNome()]["foto"] = $clube->getJogador($i)->getFoto();
    $dados_clube[$clube->getJogador($i)->getNome()]["habilidade"] = $clube->getJogador($i)->getHabilidade();
    $dados_clube[$clube->getJogador($i)->getNome()]["raca"] = $clube->getJogador($i)->getRaca();
    $dados_clube[$clube->getJogador($i)->getNome()]["capacidade_fisica"] = $clube->getJogador($i)->getCapFisica();

}

setcookie("dados_clube", json_encode($dados_clube));

$dados_clube2["nome"] = $clube2->getNome();
$dados_clube2["escudo"] = $clube2->getEscudo();

for ( $i = 0 ; $i < 4 ; $i++ ) {
    
    $dados_clube2[$clube2->getJogador($i)->getNome()]["habilidade"] = $clube2->getJogador($i)->getFoto();
    $dados_clube2[$clube2->getJogador($i)->getNome()]["habilidade"] = $clube2->getJogador($i)->getHabilidade();
    $dados_clube2[$clube2->getJogador($i)->getNome()]["raca"] = $clube2->getJogador($i)->getRaca();
    $dados_clube2[$clube2->getJogador($i)->getNome()]["capacidade_fisica"] = $clube2->getJogador($i)->getCapFisica();

}


setcookie("dados_clube2", json_encode($dados_clube2));


$jogadores_primeiro_time = array();
$jogadores_segundo_time = array();

for ( $i = 0 ; $i < 4 ; $i++ ) {

	array_push($jogadores_primeiro_time, $clube->getJogador($i)->nome);
}
for ( $i = 0 ; $i < 4 ; $i++ ) {

	array_push($jogadores_segundo_time, $clube2->getJogador($i)->nome);
}

setcookie("resultado_parcial", "0");
setcookie("resultado_final", "0");
setcookie("jogadores_primeiro_time", implode(",", $jogadores_primeiro_time));
setcookie("jogadores_segundo_time", implode(",", $jogadores_segundo_time));
setcookie("pontos_time1", "0");
setcookie("pontos_time2", "0");

?>
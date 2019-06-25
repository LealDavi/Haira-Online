<?php require_once("validador_acesso.php");

require("jogador.php");
require("clube.php");
require("conectar_banco_de_dados.php");

$sql_selecionar = "SELECT 
		jogadores.nome,
		jogadores.foto,
		jogadores.habilidade,
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

$clube_do_usuario = $_SESSION["clube_do_usuario"];


if (mysqli_num_rows($result_clube) > 0) {

    while($row = mysqli_fetch_assoc($result_clube)) {

	    	$nome_clube = $row["nome_clube"];
	        $escudo = $row["escudo"];
	        $desafiado = $row["desafiado"];

			$listaClubes[] = new Clube
			(	
				$nome_clube,
				$escudo,
				$desafiado
			);
		}
    
} else {

    echo "0 results";

}

if (mysqli_num_rows($result_jogadores) > 0) {

    while($row = mysqli_fetch_assoc($result_jogadores)) {
    	if ($row["nome_clube"] == $clube_do_usuario) {

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

for ( $i = 0 ; $i < count( $listaClubes ) ; $i++ ){
   	if ( $listaClubes[$i]->getNome() == $clube_do_usuario) {
   		$nome_escudo = $listaClubes[$i]->getEscudo();
   	}
}
$clube = new Clube($clube_do_usuario, $nome_escudo, "");

$clube->setJogador($listaJogadores);

$dados_clube["nome"] = $clube_do_usuario;
$dados_clube["escudo"] = $nome_escudo;

for ( $i = 0 ; $i < 4 ; $i++ ) {
    
    $dados_clube[$clube->getJogador($i)->getNome()]["habilidade"] = $clube->getJogador($i)->getFoto();
    $dados_clube[$clube->getJogador($i)->getNome()]["habilidade"] = $clube->getJogador($i)->getHabilidade();
    $dados_clube[$clube->getJogador($i)->getNome()]["raca"] = $clube->getJogador($i)->getRaca();
    $dados_clube[$clube->getJogador($i)->getNome()]["capacidade_fisica"] = $clube->getJogador($i)->getCapacidade_fisica();

}


setcookie("dados_clube", json_encode($dados_clube));

setcookie("listaNomes", json_encode($listaNomes));
setcookie("listaNomes1", json_encode($listaNomes));

setcookie("jogadores_primeiro_time", json_encode($listaJogadores));
setcookie("listaJogadores", json_encode($listaJogadores));

setcookie("listaClubes", json_encode($listaClubes));

mysqli_close($conn);
header("Location: home.php");

?>
<?php session_start();
	
	$usuario_autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	$perfis = array(1 => "Administrativo", 2 => "usuário");
	
	$usuarios_app = array(
		array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', "perfil_id" => 1, "clube" => "Brasil"),
		array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', "perfil_id" => 1, "clube" => "Argentina"),
		array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', "perfil_id" => 2, "clube" => "Chile"),
		array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', "perfil_id" => 2, "clube" => "Uruguai"),
	);



	foreach($usuarios_app as $user){
		if ($user["email"] == $_POST['email'] && $user["senha"] == $_POST["senha"]){
			$usuario_autenticado = true;
			$usuario_id = $user["id"];
			$usuario_perfil_id = $user["perfil_id"];
			$clube_do_usuario = $user["clube"];

		}
	}

	if ($usuario_autenticado) {

		$_SESSION["autenticado"] = "SIM";
		$_SESSION["id"] = $usuario_id;
		$_SESSION["perfil_id"] = $usuario_perfil_id;
		$_SESSION["clube_do_usuario"] = $clube_do_usuario;

		header("Location: requisicao.php");
		die();
	}else {

		$_SESSION["autenticado"] = "NAO";
		header("Location: login.php?login=erro");
		die();
	}

 ?>
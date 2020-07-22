<?php
require_once 'db_connect.php';


	if(isset($_POST['btn-cadastrar-cliente'])):
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$login = mysqli_escape_string($connect, $_POST['login']);
	$comercio = mysqli_escape_string($connect, $_POST['comercio']);
	$endereco = mysqli_escape_string($connect, $_POST['endereco']);
	$cnpj_cpf = mysqli_escape_string($connect, $_POST['cnpj_cpf']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);
	$senha = md5($senha);
	$sql = "INSERT INTO usuarios (nome, login,comercio, endereco, cnpj_cpf, senha) VALUES ('$nome', '$login', '$comercio', '$endereco','$cnpj_cpf', '$senha')";
	if(mysqli_query($connect, $sql)):
		header('location: paineladmin.php');
	else:
		header('location: index.php?erro');
	endif;
	endif;

	if(isset($_POST['btn-insere'])):
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$formato = mysqli_escape_string($connect, $_POST['formato']);
	$tamanho = mysqli_escape_string($connect, $_POST['tamanho']);
	$data_envio = date('d/m/Y');
	$link = $nome. "." . $formato;
	$sql = "INSERT INTO downloads (data, nome, tamanho, link) VALUES ('$data_envio', '$nome', '$tamanho', '$link')";
	if(mysqli_query($connect, $sql)):
		header('location: admindownload.php');
	else:
		header('location: index.php?erro');
	endif;
	endif;
	

?>
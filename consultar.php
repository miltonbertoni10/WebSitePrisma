<?php
require_once 'db_connect.php';


	if(isset($_POST['btn-consultar-cliente'])):
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$cnpj_cpf = mysqli_escape_string($connect, $_POST['cnpj_']);
	$senha = mysqli_escape_string($connect, $_POST['senha_cliente']);
	$admin = mysqli_escape_string($connect, $_POST['administrador']);
	$senha = md5($senha);
	$sql = "INSERT INTO usuarios (nome, login, senha, admin) VALUES ('$nome', '$login', '$senha', '$admin')";
	if(mysqli_query($connect, $sql)):
		header('location: paineladmin.php');
	else:
		header('location: index.php?erro');
	endif;
	endif;

?>
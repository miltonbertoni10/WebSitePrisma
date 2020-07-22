<?php
require_once 'db_connect.php';


	if(isset($_POST['btn-editar-cliente'])):
	$nome = mysqli_escape_string($connect, $_POST['nome_cliente']);
	$login = mysqli_escape_string($connect, $_POST['login_cliente']);
	$comercio = mysqli_escape_string($connect, $_POST['comercio_cliente']);
	$endereco = mysqli_escape_string($connect, $_POST['endereco_cliente']);
	$cnpj = mysqli_escape_string($connect, $_POST['cnpj_cliente']);
	$senha = mysqli_escape_string($connect, $_POST['senha_cliente']);
	$id = mysqli_escape_string($connect, $_POST['id']);
	$senha = md5($senha);
	$sql = "UPDATE usuarios SET nome = '$nome', login = '$login', comercio = '$comercio',endereco = '$endereco',cnpj_cpf = '$cnpj',senha = '$senha' WHERE id = '$id'";
	if(mysqli_query($connect, $sql)):
		header('location: paineladmin.php');
	else:
		header('location: index.php?erro');
	endif;
	endif;

	if(isset($_POST['btn-excluir-cliente'])):
	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM usuarios WHERE id = '$id'";
	if(mysqli_query($connect, $sql)):
		header('location: paineladmin.php');
	else:
		header('location: index.php?erro');
	endif;
	endif;

?>
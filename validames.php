<?php
require_once 'db_connect.php';


session_start();

if(!isset($_SESSION['logado'])):
   header('location: admin.php');
  endif;

//dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);

$id = mysqli_escape_string($connect, $_POST['id']);
$mes = mysqli_escape_string($connect, $_POST['mes']);
$senha = mysqli_escape_string($connect, $_POST['senha']);

if(isset($_GET['id'])):
	$id = mysqli_escape_string($connect, $_GET['id']);
	$sqledt = "SELECT * FROM usuarios WHERE id = '$id'";
	$result = mysqli_query($connect, $sqledt);
	$dadosedt = mysqli_fetch_array($result);
endif;

	if(isset($_POST['btn-valida-cliente'])):
	 $sql = "SELECT * FROM senha_mes WHERE id_usuario = '$id'";

	$resultado = mysqli_query($connect, $sql);

	if(mysqli_num_rows($resultado) == 1):
		$sql = "UPDATE senha_mes SET $mes = '$senha' WHERE id_usuario = '$id'";
	else:
	$sql = "INSERT INTO senha_mes ($mes, id_usuario ) VALUES ('$senha','$id')";
endif;
	if(mysqli_query($connect, $sql)):
		header('location: paineladmin.php');
	else:
		header('location: validames.php');
	endif;
	endif;

	if(isset($_GET['id'])):
		$id = mysqli_escape_string($connect, $_GET['id']);
		$sqledt = "SELECT * FROM usuarios WHERE id = '$id'";
		$result = mysqli_query($connect, $sqledt);
		$dadosedt = mysqli_fetch_array($result);
	endif;

	if(isset($_POST['btn-bloqueia-cliente'])):

	 $sql = "SELECT * FROM senha_mes WHERE id_usuario = '$id'";

	$resultado = mysqli_query($connect, $sql);

	if(mysqli_num_rows($resultado) == 1):
		if(empty($senha)):
		$senha = NULL;
		$sql = "UPDATE senha_mes SET $mes = '$senha' WHERE id_usuario = '$id'";
		else:
	 	echo "Usuario não cadastrado!";
	 endif;
	endif;
	if(mysqli_query($connect, $sql)):
		header('location: paineladmin.php');
	else:
		header('location: validames.php');
	endif;
	endif;

?>

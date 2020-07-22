<?php
require_once 'db_connect.php';


	if(isset($_POST['btn-excluir'])):
	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM usuarios WHERE id = '$id'";
	if(mysqli_query($connect, $sql)):
		header('location: paineladmin.php');
	else:
		header('location: index.php?erro');
	endif;
	endif;

?>
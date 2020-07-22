<?php

require_once 'db_connect.php';

//sessao
session_start();

if(!isset($_SESSION['logado'])):
   header('location: admin.php');
  endif;

//dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);

//select

if(isset($_GET['id'])):
	$id = mysqli_escape_string($connect, $_GET['id']);

	$sqledt = "SELECT * FROM usuarios WHERE id = '$id'";
	$result = mysqli_query($connect, $sqledt);
	$dadosedt = mysqli_fetch_array($result);
endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<link rel="icon" href="imagens/icon.png" type="image/x-icon" />
	<meta name="author" content="Milton Bertoni">
	<link rel="stylesheet" type="text/css" href="CSS\bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CSS\adminesty.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link href="https://fonts.googleapis.com/css?family=Merriweather:900|Oswald" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
				<script type="text/javascript" src="js/bootstrap.js"></script>
	
				<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
		<div class="col-12 mt-3 pl-4">

			<nav class="nav justify-content-end">
			 <a class="nav-link active" href="paineladmin.php">Home</a>
			<a class="nav-link" href="situacao.php">Consulta situação</a>
			  <a class="nav-link" href="#">Link</a>
                       

			
                <p> <?php if(isset($_SESSION['logado'])):
                    $logout = "logout.php";
                       echo 'Olá! ' . $dados['nome'];  
                       echo "<a class='ml-3 btn btn-dark' href='$logout'>Sair</a>";
                        endif;
                      ?></p>
               </nav>
              </div>
					 <div class="cadastro-cliente">
              			<h2 class="ml-5">Editar cliente</h2>
						<form class="col-12 center" action="update.php" method="post" name="formlogin">
							<input type="hidden" name="id" value="<?php echo $dadosedt['id']; ?>">
							<div class="center mb-2 col-md-6">
								<input  class="form-control" type="Text" name="nome_cliente" id="nome_cliente" value="<?php echo $dadosedt['nome']; ?>">
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="login_cliente" id="login_cliente" value="<?php echo $dadosedt['login']; ?>">
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="comercio_cliente" id="comercio_cliente" value="<?php echo $dadosedt['comercio']; ?>">
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="endereco_cliente" id="endereco_cliente" value="<?php echo $dadosedt['endereco']; ?>">
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="cnpj_cliente" id="cnpj_cliente" value="<?php echo $dadosedt['cnpj_cpf']; ?>">
							</div>
						
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="password" name="senha_cliente" id="_cliente" placeholder="Nova senha">
							</div>
							<input class="ml-3 col-md-1 btn btn-primary" type="submit" value="Editar" name="btn-editar-cliente">
							<input class="btn btn-danger" type="submit" value="Excluir" name="ml-3 col-md-1 btn-excluir-cliente">
						</form>

					</div>
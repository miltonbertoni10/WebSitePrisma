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
			  <a class="nav-link" href="situacao.php">Consulta Situação</a>
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
              			<h2 class="ml-5">Cliente</h2>
              			<form class="col-12 center"  action="validames.php" method="POST" name="formvalida">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="nome" id="nome" value="<?php echo $dadosedt['nome']; ?> " disabled>
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="login" id="login" value="<?php echo $dadosedt['login']; ?>"disabled>
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="comercio" id="comercio" value="<?php echo $dadosedt['comercio']; ?> " disabled>
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="endereco" id="endereco" value="<?php echo $dadosedt['endereco']; ?> " disabled>
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="cnpj_cpf" id="cnpj_cpf" value="<?php echo $dadosedt['cnpj_cpf']; ?> " disabled>
							</div>
							
							<div class="center mb-2 col-md-6">
								<small id="emailHelp" class="form-text text-muted">*Insira o mês e a senha se o cliente já tiver pago.</small>
							<select name="mes" class="form-control">
								<option value="janeiro">Janeiro</option>
								<option value="Fevereiro">Fevereiro</option>
								<option value="marco">Março</option>
								<option value="abril">Abril</option>
								<option value="maio">Maio</option>
								<option value="junho">Junho</option>
								<option value="julho">Julho</option>
								<option value="Agosto">Agosto</option>
								<option value="Setembro">Setembro</option>
								<option value="outubro">Outubro</option>
								<option value="novembro">Novembro</option>
								<option value="dezembro">Dezembro</option>
							</select>
							<input class="form-control mt-2" placeholder="Digite a senha de validação do cliente" type="number" name="senha" >
							<input class="btn btn-success mt-2" type="submit" value="Validar" name="btn-valida-cliente">
							<input class="btn btn-danger mt-2" type="submit" value="Bloquear" name="btn-bloqueia-cliente">
								</div>
						</form>

					</div>
					

</body>
</html>
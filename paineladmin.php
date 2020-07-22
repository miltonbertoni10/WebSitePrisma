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
$dadosuser = mysqli_fetch_array($resultado);

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
			  <a class="nav-link" href="admindownload.php">Downloads</a>
                       

			
                <p> <?php if(isset($_SESSION['logado'])):
                    $logout = "logout.php";
                       echo 'Olá! ' . $dadosuser['nome'];  
                       echo "<a class='ml-3 btn btn-dark' href='$logout'>Sair</a>";
                        endif;
                      ?></p>
               </nav>
              </div>

					 <div class="cadastro-cliente">
              			<h2 class="ml-5">Cadastrar cliente</h2>
						<form class="col-12 center" action="cadastrar.php" method="post" name="formlogin">
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="nome" id="nome" placeholder="Nome">
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="number" name="login" id="login" placeholder="Login">
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="comercio" id="comercio" placeholder="Nome do Comercio">
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="endereco" id="endereco" placeholder="Endereço">
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="number" name="cnpj_cpf" id="cnpj_cpf" placeholder="CNPJ ou CPF">
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="password" name="senha" id="senha" placeholder="senha">
							</div>

							<input class="ml-3 col-md-2 btn btn-primary" type="submit" value="Cadastrar" name="btn-cadastrar-cliente">
						</form>

					</div>
					<div class="insere-cliente ml-5 mt-3">
						<h2>Importar dados de clientes</h2>
						<form enctype="multipart/form-data" class="ml-3" method="POST" action="processa-arquivo.php">
							<?php
								if (isset($_SESSION['msg'])) {
									$_SESSION['msg'];
									unset($_SESSION['msg']);
								}
							?>
							<label>Arquivo</label>
							<input type="file" name="arquivo"></br>
							<small id="emailHelp" class="form-text text-muted">*Selecione o mês somente se for inserir as senhas de validação</small>
							<div class="col-md-3 mt-2">
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
						</div>
							<input name="btn-importar" class="mt-3 btn btn-primary" type="submit" value="Importar Clientes">
							<input  class="mt-3 btn btn-success" name="btn_importar-senha" type="submit" value="Importar senha">
							<input class="mt-3 btn btn-danger" name="btn-excluir-clientes" type="submit" value="Excluir Todos os Clientes">
						</form>
						
					</div>

					 <div class="consulta-cliente">


              			<h2 class="ml-5 mt-3">Consulta de Clientes</h2>
              			<form class="col-12 center"  action="<?php echo $_SERVER['PHP_SELF'] ?>?a=consultar" method="post" name="formconsulta">
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="number" name="cnpj_cpf" id="cnpj_cpf" placeholder="CNPJ ou CPF">
							</div>

							<input class="ml-3 col-md-2 btn btn-primary" type="submit" value="Consultar">
						</form>

              			<table class="table mt-2 table-striped">
              			<th cope="col">Nome</th>
						<th cope="col">Login</th>
						<th cope="col">Comercio</th>
						<th cope="col-2">Endereço</th>
						<th cope="col">CNPJ/CPF</th>
						<th cope="col">EDITAR</th>
						<th cope="col">VALIDAR</th>
						<?php
						$erros;
						if(isset($_POST['cnpj_cpf'])):
								$cnpj_cpf = mysqli_escape_string($connect, $_POST['cnpj_cpf']);
								$sql = "SELECT * FROM usuarios WHERE cnpj_cpf = '$cnpj_cpf'";
							if(mysqli_query($connect, $sql)):
								$resultado = mysqli_query($connect, $sql);

								while ($dados = mysqli_fetch_array($resultado)):
									$iduser =$dados['id'];
									echo "<tr><td>" . $dados['nome']. "</td>" . "<td>" . $dados['login']. "</td>" . "<td>" . $dados['comercio']. "</td>" . "<td>" . $dados['endereco'] . "</td>" .
									"<td>" . $dados['cnpj_cpf'] . "</td>" ."<td><a href='editar.php?id= $iduser'>Editar</a>" . "</td>" ."<td><a href='valida.php?id= $iduser'>Validar</a>" . "</td>" ."</tr>";
								endwhile;
							if(!mysqli_num_rows($resultado) && !empty($_POST['cnpj_cpf'])):
								$erros[] = "<li>Usuario não cadastrado ou CNPJ/CPF invalido! </li>";
								foreach ($erros as $erro):
									echo $erro;
								endforeach;
							endif;
							endif;
								
							endif;
							
						?>
						</table>


						
						
					</div>
					

</body>
</html>
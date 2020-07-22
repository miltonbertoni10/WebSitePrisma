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
	<title>Situação dos clientes</title>
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
                       echo 'Olá! ' . $dados['nome'];  
                       echo "<a class='ml-3 btn btn-dark' href='$logout'>Sair</a>";
                        endif;
                      ?></p>
               </nav>
              </div>
	<div class="center mb-2 col-md-6">
						<h2 class="ml-5 mt-3">Consulta Pendência de Clientes</h2>
              			<form class="col-12 center" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formconsulta">
			
								<input class="form-control mb-2" type="number" name="cnpj" id="cnpj" placeholder="CNPJ ou CPF">
							<select name="mes" class="form-control">
								<option value="janeiro">Janeiro</option>
								<option value="fevereiro">Fevereiro</option>
								<option value="marco">Março</option>
								<option value="abril">Abril</option>
								<option value="maio">Maio</option>
								<option value="junho">Junho</option>
								<option value="julho">Julho</option>
								<option value="agosto">Agosto</option>
								<option value="setembro">Setembro</option>
								<option value="outubro">Outubro</option>
								<option value="novembro">Novembro</option>
								<option value="dezembro">Dezembro</option>
							</select>
							

							<input class="btn btn-primary mt-3" type="submit" value="Consultar">
						</form>
					

</div>
              			<table class="table mt-5 table-striped">
              			<th cope="col">Nome</th>
						<th cope="col">Comercio</th>
						<th cope="col">CNPJ/CPF</th>
						<th cope="col">Codigo</th>
						<th cope="col">Situação</th>
						<th cope="col">Mês</th>
						<?php
						$erros;
						
						if(isset($_POST['cnpj'])):
								$cnpj = mysqli_escape_string($connect, $_POST['cnpj']);
								$mes = mysqli_escape_string($connect, $_POST['mes']);

								$sql = "SELECT * FROM usuarios WHERE cnpj_cpf = '$cnpj'";
								
							if(mysqli_query($connect, $sql)):
								$resultado = mysqli_query($connect, $sql);

							if($dados = mysqli_fetch_array($resultado) ):

							$iduser = $dados['id'];

							if($mes == 'janeiro'){
							$sql_mes = "SELECT janeiro FROM senha_mes WHERE id_usuario = '$iduser'";
							}
							if($mes == 'fevereiro'){
							$sql_mes = "SELECT fevereiro FROM senha_mes WHERE id_usuario = '$iduser'";
							}

							if($mes == 'marco'){
							$sql_mes = "SELECT marco FROM senha_mes WHERE id_usuario = '$iduser'";
							}
							if($mes == 'abril'){
							$sql_mes = "SELECT abril FROM senha_mes WHERE id_usuario = '$iduser'";
							}
							if($mes == 'maio'){
							$sql_mes = "SELECT maio FROM senha_mes WHERE id_usuario = '$iduser'";
							}
							if($mes == 'junho'){
							$sql_mes = "SELECT junho FROM senha_mes WHERE id_usuario = '$iduser'";
							}
							if($mes == 'julho'){
							$sql_mes = "SELECT julho FROM senha_mes WHERE id_usuario = '$iduser'";
							}
							if($mes == 'agosto'){
							$sql_mes = "SELECT agosto FROM senha_mes WHERE id_usuario = '$iduser'";
							}
							if($mes == 'setembro'){
							$sql_mes = "SELECT setembro FROM senha_mes WHERE id_usuario = '$iduser'";
							}
							if($mes == 'outubro'){
							$sql_mes = "SELECT outubro FROM senha_mes WHERE id_usuario = '$iduser'";
							}
							if($mes == 'novembro'){
							$sql_mes = "SELECT novembro FROM senha_mes WHERE id_usuario = '$iduser'";
							}
							if($mes == 'dezembro'){
							$sql_mes = "SELECT dezembro FROM senha_mes WHERE id_usuario = '$iduser'";
							}




									mysqli_query($connect, $sql_mes);
									$resultado = mysqli_query($connect, $sql_mes);

								if($senha_mes = mysqli_fetch_array($resultado) ):
									if($senha_mes[$mes] == NULL or $senha_mes[$mes] == 0  ):
									echo "<tr><td>" . $dados['nome']. "</td>" . "<td>" . $dados['comercio']. "</td>" . "<td>" . $dados['cnpj_cpf']. "</td>" ."<td>" . $senha_mes[$mes]. "</td>"."<td>Em aberto</td>".
									"<td>".$mes."</td>"."</tr>";
									else:
									echo "<tr><td>" . $dados['nome']. "</td>" . "<td>" . $dados['comercio']. "</td>" . "<td>" . $dados['cnpj_cpf']. "</td>" ."<td>" . $senha_mes[$mes]. "</td>"."<td>Pago</td>".
									"<td>".$mes."</td>"."</tr>";
									endif;

									endif;
								endif;
							endif;
					
							endif;
							
						?>
						</table>


</body>
</html>

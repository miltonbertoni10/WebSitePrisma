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
				<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	
</head>
<body>
		<div class="col-12 mt-3 pl-4">

			<nav class="nav justify-content-end">
			  <a class="nav-link active" href="paineladmin.php">Home</a>
			  <a class="nav-link" href="situacao.php">Consulta situação</a>
			  <a class="nav-link" href="admindownload.php">Download</a>
                       

			
                <p> <?php if(isset($_SESSION['logado'])):
                    $logout = "logout.php";
                       echo 'Olá! ' . $dadosuser['nome'];  
                       echo "<a class='ml-3 btn btn-dark' href='$logout'>Sair</a>";
                        endif;
                      ?></p>
               </nav>
              </div>


					<div class="insere-arquivo ml-5 mt-3">
						<h2>Importar arquivo para o servidor</h2>
						<form enctype="multipart/form-data" class="ml-3" method="POST" action="envia-ftp.php">
							<?php
								if (isset($_SESSION['msg'])) {
									$_SESSION['msg'];
									unset($_SESSION['msg']);
								}
							?>
							<label>Arquivo</label>
							<input type="file" name="arquivo"></br>
							<input name="btn-importar-arquivo" class="mt-3 btn btn-primary" type="submit" value="Importar arquivo">
						</form>
						
					</div>
					<div class="cadastro-cliente">
              			<h2 class="ml-5">Inserir arquivo para download</h2>
						<form class="col-12 center" action="cadastrar.php" method="post" name="formlogin">
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="nome" id="nome" placeholder="Nome">
							</div>
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="Text" name="tamanho" id="tamanho" placeholder="Tamanho do arquivo">
							</div>
							<div class="center mb-2 col-md-6">
							<select name="formato" class="form-control">
									<option value="rar">.rar</option>
									<option value="exe">.exe</option>
									<option value="txt">.txt</option>
									<option value="zip">.zip</option>
									
								</select>
							</div>
							<input class="ml-3 col-md-2 btn btn-primary" type="submit" value="Inserir Arquivo" name="btn-insere">
						</form>

					</div>
					
		</script>
					 
					

</body>
</html>
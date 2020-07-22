<?php
//conexao
require_once 'db_connect.php';

//sessao
session_start();

//botao enviar
if(isset($_POST['btn-entrar'])):
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);

	if(empty($login) or empty($senha)):
		$erros[] = "<li>Os campos login e senha precisam ser preenchidos</li>";
	else:
		$sql = "SELECT login FROM usuarios WHERE login = '$login'";
		$resultado = mysqli_query($connect, $sql);
		if(mysqli_num_rows($resultado) > 0):
			$senha = md5($senha);
			$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha' ";
			$resultado = mysqli_query($connect, $sql);

			if(mysqli_num_rows($resultado) == 1):
				$dados = mysqli_fetch_array($resultado);
				if($dados['admin'] == 1):
				mysqli_close($connect);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('location: paineladmin.php');
			else:
				$erros[] = "<li>Você não tem permissão para acessar!</li>";
			endif;
			else:
				$erros[] = "<li> Usuario e senha não conferem </li>";
			endif;	
		else:
			$erros[] = "<li> Usuario inexistente </li>";
		endif;
	endif;
endif;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel Administrador</title>
	<link rel="icon" href="imagens/icon.png" type="image/x-icon" />
	<meta name="author" content="Milton Bertoni">
	<link rel="stylesheet" type="text/css" href="CSS\bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link href="https://fonts.googleapis.com/css?family=Merriweather:900|Oswald" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
				<script type="text/javascript" src="js/bootstrap.js"></script>
	
				<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body class="bg-primary" >
	
	<div class="container center mt-5 " >
	<div  align="center" class="col-md-12">
		<a href="home.php" title="Prisma Automação Comercial"><img width="200px" src="imagens/logo.png"></a>
		<h2>Painel Administrativo</h2>
						<?php
							if(!empty($erros)):
								foreach ($erros as $erro):
									echo $erro;
								endforeach;		
							endif
						?>
						<form class="col-12 center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formlogin">
							<div class="center mb-2 col-md-6">
								<input class="form-control" type="number" name="login" placeholder="Entre com o usuario">
							</div>
							<div class="center col-md-6">
								<input class="form-control " type="password" name="senha" placeholder="Digite a senha">
							</div>
							<input  class="btn btn-dark mt-3" type="submit" value="Entrar" name="btn-entrar">
						</form>

					</div>
		</div>
</body>
</html>
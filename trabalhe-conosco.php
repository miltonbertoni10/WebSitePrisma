<?php

	require_once 'db_connect.php';

	//sessao
	session_start();

	if(isset($_SESSION['logado'])):
	   $id = $_SESSION['id_usuario'];
	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
	mysqli_close($connect);
	  endif;

	
?>		


		<HTML>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Prisma Automação Comercial</title>
				<meta name="description" content="Prisma Automação comercial, Empresa de venda de sistemas e Equipamentos para automação comercial">
				<meta name="keywords" content="Empresa Automação Comercial, venda de equipamentos,vendas">
				<link rel="icon" href="imagens/icon.png" type="image/x-icon" />
				<meta name="robots" content="index, follow">
				<meta name="author" content="Milton Bertoni">
				<link rel="stylesheet" type="text/css" href="CSS\Estilo.css">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link href="https://fonts.googleapis.com/css?family=Merriweather:900|Oswald" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
				<script type="text/javascript" src="js/jquery.js"></script>
				<script type="text/javascript" src="js/efeito.js"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
				<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
				<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
				

			</head>
			<body>
				<header class="cabecalho">
				
						
					
						<h1 class="logo">
					    	<a href="home.php" title="Prisma Automação Comercial"><img src="imagens/logo.png"></a>
					  	</h1>
					  	
					  	 <div class="loga-site">
			                <p> <?php if(isset($_SESSION['logado'])):
			                    $logout = "logout.php";
			                       $nome = explode(" ",$dados['nome']);
						  	       echo 'Olá! ' . $nome[0]; 
			                       echo "<a href='$logout'>Sair</a>";
			                        endif;
			                      ?>
			                       </p>
			              </div>

					  	<button class="btn-menu"> <i class="fas fa-bars fa-lg"></i></button>

					<nav class="menu">
						<a class="btn-close" href="#" >x</a>
						<ul>
							<?php
							$home = "home.php";
							$index = "index.php";

							 if(isset($_SESSION['logado'])):
					  	       echo "<li><a  href='$home'>Início</a></li>";
					  	       	else:
					  	       		echo "<li><a  href='$index'>Início</a></li>";
					  	      	endif;
					  	      ?>
							<li><a  href="sistemas.php">Softwares</a></li>
							<?php
							$downloads = "downloads.php";
							

							 if(isset($_SESSION['logado'])):
					  	       echo "<li><a  href='$downloads'>Downloads</a></li>";
					  	       	else:
					  	       		
					  	      	endif;
					  	      ?>
							<li><a  href="empresa.php">A empresa</a></li>
							<li><a  href="trabalhe-conosco.php">Trabalhe Conosco</a></li>
						</ul>
					</nav>
					
				</header>
				<section class="banner-tb">
					<div class="container">
						
						<h1>Trabalhe Conosco</h1>
					</div>
				
				</section>
					
			

					<section class="trabalhe-empresa">
						<div class="container">

						<h2>Trabalhe Conosco</h2>
						<h3>Se enteressou pela nossa empresa? Mande já o seu curriculo que o analisaremos.</h3>
						<div class="center-curriculo">
						<form method="POST" name="form_contato" action="processa.php">
							<div class="row-cur">
							<label for="nome">Nome Completo:</label>
							<input type="text" name="nome" required>
							</div>
							<div class="row-cur">

							<label for="email">Email:</label>
							<input type="email" name="email" required>
							</div>

						<div class="row-cur">

							<label for="telefone">Telefone:</label>
							<input type="tel" name="telefone" required>
						</div>

							<div class="row-cur">
								<label for="endereco-cur">Endereço:</label>
								<input type="text" name="endereco" required>

							</div>
							<div class="row-cur">

							<label for="formacao">Formação:</label>
							<input type="text" name="formacao" required>
						</div>

						<div class="exp-ti">
							<h3>Conte nos um pouco sobre as suas experiências de trabalho</h3>
							<textarea class="text-exp" name="experiencia" rows="10" cols="50" required>
							</textarea required>
						</div>

					<div class="row-cur exp-ti">
						<button class="btn">Enviar</button>
					</div>
						</form>
						</div>
					</div>
			
					</section>
				
				


					<div class="footer">
					<h2>Copyright 2009 - 2018 <a href="#" title="Prisma Automação Comercial">Prisma Automação Comercial</a> </h2>
					

					<div class="social-footer">
						<button class="btn-social"><i class="fab fa-youtube fa-lg"></i></button>
					<button class="btn-social"><i class="fab fa-twitter fa-lg"></i></button>
					<button class="btn-social"><i class="fab fa-linkedin-in fa-lg"></i></button>
					
					</div>
					</div>
				
				
				
				<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
				<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


				<script>
		
					$('.btn-menu').click(function(){
						$('.menu').show();
					});
					$('.btn-close').click(function(){
						$('.menu').hide();
					});
				</script>
			</body>
		</HTML>
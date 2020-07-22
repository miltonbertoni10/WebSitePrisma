<?php

	require_once 'db_connect.php';
	//sessao
	session_start();

	

	if(!isset($_SESSION['logado'])):
	   header('location: index.php');
	  endif;

	//dados
	$id = $_SESSION['id_usuario'];
	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
?>		

		<HTML>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Prisma Automação Comercial</title>
				<meta name="description" content="Prisma Automação comercial, Empresa de venda de sistemas e Equipamentos para automação comercial">
				<link rel="icon" href="imagens/icon.png" type="image/x-icon" />
				<meta name="keywords" content="Empresa Automação Comercial, venda de equipamentos,vendas">
				<meta name="robots" content="index, follow">
				<meta name="author" content="Milton Bertoni">
				<link rel="stylesheet" type="text/css" href="CSS\Estilo.css">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link href="https://fonts.googleapis.com/css?family=Merriweather:900|Oswald" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
				<script type="text/javascript" src="js/jquery.js"></script>
				<script type="text/javascript" src="js/efeito.js"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
						
						<h1>Downloads</h1>
						<h3 class="h3-t">Aqui você encontra todo o acervo de links úteis.</h3>
					</div>
				
				</section>

				<div class="container">
					
					<section class="listDownloads">
						<h3>Aqui você encontra todo o acervo de links para download que você precisar.</h3>
				<table style="width:100%">
				<tr>
				    <th>Data</th>
				    <th>Nome do arquivo</th> 
				    <th>Tamanho</th>
				    <th>Download</th>
				  </tr>
				  <?php 

				  $sql = "SELECT * FROM downloads";
				  $downloads = mysqli_query($connect, $sql);

				  while ($arquivos = mysqli_fetch_array($downloads)):
									echo "<tr><td>" . $arquivos['data']. "</td>" . "<td>" . $arquivos['nome']. "</td>" . "<td>" . $arquivos['tamanho']. "</td>
									<td><a href='arquivos/". $arquivos['link']. "''>Download</a>" . "</td></tr>";
								endwhile;


				  ?>
				</table>
					</section>
				
					
				</div>

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

					function openbtn(evt, citybtn) {
				    var i, tabcontent, tablinks;
				    tabcontent = document.getElementsByClassName("tabcontent");
				    for (i = 0; i < tabcontent.length; i++) {
				        tabcontent[i].style.display = "none";
				    }
				    tablinks = document.getElementsByClassName("tablinks");
				    for (i = 0; i < tablinks.length; i++) {
				        tablinks[i].className = tablinks[i].className.replace(" active", "");
				    }
				    document.getElementById(citybtn).style.display = "block";
				    evt.currentTarget.className += " active";
				}

					$('.btn-menu').click(function(){
						$('.menu').show();
					});
					$('.btn-close').click(function(){
						$('.menu').hide();
					});
				</script>
			</body>
		</HTML>
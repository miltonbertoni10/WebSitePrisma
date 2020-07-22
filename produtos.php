<?php

require_once 'db_connect.php';

//sessao
session_start();

if(!isset($_SESSION['logado'])):
   header('location: produtos.php');
  endif;

//dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
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
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
				<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
				<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
			

			</head>
			<body>
				<header class="cabecalho">
				
						
					
						<h1 class="logo">
					    	<a href="index.html" title="Prisma Automação Comercial"><img src="imagens/logo.png"></a>
					  	</h1>

					  	<button class="btn-menu"> <i class="fas fa-bars fa-lg"></i></button>

					<nav class="menu">
						<a class="btn-close" href="#" >x</a>
						<ul>
							<li><a  href="index.html">Início</a></li>
							<li><a  href="sistemas.html">Softwares</a></li>
							<li><a  href="#">Credenciados</a></li>
							<li><a  href="trabalhe-conosco.html">Trabalhe Conosco</a></li>
						</ul>
					</nav>
					
				</header>
				<section class="banner-tb">
					<div class="container">
						
						<h1>Produtos</h1>
						<h3 class="h3-t">Nós trabalhamos com uma grande variedade de equipamentos para automação comercial.</h3>
					</div>
				
				</section>

				<div class="container">
					
					<aside>
						<div id="myBtnContainer">
							<ul >
						<div class="tabProd">
							  <button class="tablinks" onclick="openbtn(event, 'computadores')">
								<span class="tooltiptext">Computadores</span>
							</button>
							  <button class="tablinks" onclick="openbtn(event, 'impressoras')">
								<span class="tooltiptext">Impressoras</span>
							  </button>
							  <button class="tablinks" onclick="openbtn(event, 'monitores')">
								<span class="tooltiptext">Monitores</span>
							  </button>
							  <button class="tablinks" onclick="openbtn(event, 'gavetas')">
								<span class="tooltiptext">Gavetas</span>
							  </button>
							  <button class="tablinks" onclick="openbtn(event, 'leitores')">
								<span class="tooltiptext">Leitores</span>
							  </button>
							  <button class="tablinks" onclick="openbtn(event, 'switches')">
								<span class="tooltiptext">Switches</span>
							  </button>
							  <button class="tablinks" onclick="openbtn(event, 'balancas')">
								<span class="tooltiptext">Balanças</span>
							  </button>
							  <button class="tablinks" onclick="openbtn(event, 'cabos')">
								<span class="tooltiptext">Cabos</span>
							  </button>
					</div>
											
				</ul>

  
 

					</div>


					</aside>
					<section class="prodList">

<div id="funcProd">
	<div id="computadores" class="tabcontent">
	 <h3>Computadores</h3>
	<ul>
		<li><img src="Imagens/gaveta.jpg"></li>
	</ul>
</div>

<div id="impressoras" class="tabcontent">
  <h3>Impressoras</h3>
  <ul>
		<li><img src="Imagens/imp-epson.jpg"></li>
		<li><img src="Imagens/imp-bematech.jpg"></li>
	</ul> 
</div>

<div id="monitores" class="tabcontent">
  <h3>Monitores</h3>
  <ul>
		<li><img src="Imagens/monitor.jpg"></li>
	</ul>
</div>
<div id="gavetas" class="tabcontent">
  <h3>Gavetas</h3>
  <ul>
		<li><img src=""></li>
	</ul>
</div>

<div id="leitores" class="tabcontent">
  <h3>Leitores</h3>
  <ul>
		<li><img src=""></li>
	</ul>
</div>

<div id="switches" class="tabcontent">
  <h3>Switches</h3>
  <ul>
		<li><img src=""></li>
	</ul>
</div>

<div id="balancas" class="tabcontent">
  <h3>Balanças</h3>
  <ul>
		<li><img src=""></li>
	</ul>
</div>
<div id="cabos" class="tabcontent">
  <h3>Cabos</h3>
  <ul>
		<li><img src=""></li>
	</ul>
</div>

						
					</div>
						
							
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
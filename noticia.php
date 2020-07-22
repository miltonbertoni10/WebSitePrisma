<?php

require_once 'db_connect.php';

//sessao
session_start();

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
						
						<h1>Noticias</h1>
					</div>
				
				</section>
					
					<section class="blog-news">
						<div class="container">
							<h2>Titulo da Noticia</h2>
							<h3>Subtitulo da noticia</h3>
							<div class="content-new">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a lorem euismod nulla consectetur egestas. Phasellus ac tristique risus. Nullam ut enim tincidunt, fermentum turpis non, porta massa. In aliquam sem vel volutpat eleifend. Cras diam sapien, maximus vitae aliquet in, commodo ut erat. Morbi sit amet ante ut tortor pharetra eleifend vitae non dui. Morbi rutrum felis ligula, non faucibus lectus commodo at. Nam ac mattis sem.

Ut pharetra, libero sed vestibulum vehicula, neque sapien venenatis arcu, vel fringilla lectus libero a tortor. Cras mi magna, iaculis eu purus quis, iaculis porttitor velit. Ut arcu est, rhoncus ut magna sit amet, volutpat tempus enim. Aliquam fringilla odio leo, pellentesque posuere sapien lacinia et. Quisque a erat eget risus fringilla rutrum. Suspendisse massa nibh, varius tincidunt ante sit amet, tincidunt ultricies orci. In ornare venenatis facilisis. Curabitur gravida congue eros quis mattis. Phasellus et nibh sem. Fusce ac ligula mollis sapien tristique blandit non ac elit. Aenean sagittis elit purus, et facilisis tortor vulputate ut. In malesuada lacus orci, eget eleifend justo pulvinar nec. Curabitur nec consequat magna, vel sollicitudin ligula. Nullam ante sem, dignissim sed tristique id, elementum eu turpis.

Quisque in massa leo. Mauris id ultricies lectus. Nam in sem interdum, vestibulum nisl eu, eleifend quam. Vivamus pellentesque tortor feugiat vehicula consequat. Curabitur blandit, urna quis vehicula molestie, purus neque vulputate lorem, imperdiet sollicitudin felis erat nec nibh. Nullam non sagittis ipsum. Mauris ullamcorper est ac nunc semper accumsan.

Nulla et leo non augue lacinia maximus vitae sed nunc. Nunc consectetur arcu viverra magna mollis, nec scelerisque velit ultrices. Nunc non consectetur dolor. Nulla mattis mauris arcu, eget gravida libero pharetra sit amet. Morbi suscipit ac augue eget fringilla. Etiam finibus sapien vitae velit feugiat, at lacinia mauris faucibus. Ut ex sem, mollis non sagittis a, sodales nec mi. Cras bibendum enim ac urna venenatis vulputate. Vestibulum congue lacinia risus, sed commodo ex pellentesque sed. Donec maximus auctor cursus. Pellentesque non luctus nulla. Pellentesque arcu eros, posuere quis laoreet eu, commodo id enim. Pellentesque lobortis nisl vitae eros pharetra efficitur.

Curabitur in ex id turpis mattis lobortis sit amet eu tellus. Sed tempus ex arcu, eu rutrum nibh efficitur sit amet. Maecenas convallis diam a elementum hendrerit. Aenean et dapibus ante. Ut dignissim vitae enim vitae rutrum. Cras porttitor diam eu quam pellentesque accumsan. Phasellus ultricies ligula vitae venenatis sagittis. Nullam laoreet varius justo, vel euismod orci posuere a.
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
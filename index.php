		
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
	$admin = 1;

	if(empty($login) or empty($senha)):
		$erros[] = "<li>Os campos login e senha precisam ser preenchidos</li>";
	else:
		$sql = "SELECT login FROM usuarios WHERE login = '$login'";
		$resultado = mysqli_query($connect, $sql);
		if(mysqli_num_rows($resultado) > 0):
			$senha = md5($senha);
			$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
			$resultado = mysqli_query($connect, $sql);

			if(mysqli_num_rows($resultado) == 1):
				$dados = mysqli_fetch_array($resultado);
				mysqli_close($connect);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('location: home.php');
			else:
				$erros[] = "<li> Usuario e senha não conferem </li>";
			endif;	
		else:
			$erros[] = "<li> Usuario inexistente </li>";
		endif;
	endif;
endif;
?>

		<HTML>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Prisma Automação Comercial</title>
				<link rel="icon" href="imagens/icon.png" type="image/x-icon" />
				<meta name="description" content="Prisma Automação comercial, Empresa de venda de sistemas e Equipamentos para automação comercial">
				<meta name="keywords" content="Empresa Automação Comercial, venda de equipamentos,vendas">
				<meta name="robots" content="index, follow">
				<meta name="author" content="Milton Bertoni">
				<link rel="stylesheet" type="text/css" href="CSS\Estilo.css">
				<link href="https://fonts.googleapis.com/css?family=Merriweather:900|Oswald" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
				<script type="text/javascript" src="js/jquery.js"></script>
				<script type="text/javascript" src="js/efeito.js"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
				

			</head>
			<body>
				<header class="cabecalho">
						
					
						<h1 class="logo">
					    	<a href="home.php" title="Prisma Automação Comercial"><img src="imagens/logo.png"></a>
					  	</h1>

					  	<button class="btn-menu"> <i class="fas fa-bars fa-lg"></i></button>

					<nav class="menu">
						<a class="btn-close" href="#" >x</a>
						<ul>
							<li><a  href="index.php">Início</a></li>
							<li><a  href="sistemas.php">Softwares</a></li>
							<li><a  href="empresa.php">A empresa</a></li>
							<li><a  href="trabalhe-conosco.php">Trabalhe Conosco</a></li>
						</ul>
					</nav>
				
				</header>
				<section class="banner">
					<div class="container">
						<div class="title">
						<h1>Desenvolvendo soluções para o seu empreendimento!</h1>
						<p>Softwares simples e completos capazes de auxiliar na gestão do seu negócio.</p>
					</div>
					<div class="painelusuario">
						<?php
							if(!empty($erros)):
								foreach ($erros as $erro):
									echo $erro;
								endforeach;		
							endif
						?>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formlogin">
							<div class="form-row">
								<input type="number" name="login" placeholder="Digite o CNPJ">
							</div>
							<div class="form-row">
								<input type="password" name="senha" placeholder="Digite a senha">
							</div>
							<input class="btn" type="submit" value="Acessar área do cliente" name="btn-entrar">
						</form>

					</div>
				</div>

				</section>
				
				<section class="container">
					<div class="Info-atendimento">
					<h2>A Prisma Automação comercial se preocupa com seus clientes.</h2>
					<h3>Nossa empresa está sempre preocupada em manter seus clientes com programas atualizados e com o que há de mais moderno em tecnologia, além disso, nossa empresa busca construir a base dos nossos sistemas com informações de extrema relevância para a gestão do seu empreendimento.</h3>
						<div class="box-atendi box-atd-1">
							<img src="imagens/hora.svg">
							<h1>Horário de atendimento</h1>
							<p>Segunda a sábado - 08:30 às 20:30</p>
							<p>Domingo de 08:30 às 17:30</p>
						
						</div>
						<div class="box-atendi box-atd-2">
							<img src="imagens/telefone.svg">
						
							<h1>Central de atendimento</h1>
							<p>(31) 3037-6519 (31) 98562-1001</p>
							<p>Atendimento por telefone e WhatsApp</p>
							
				
						</div>

						<div class="box-atendi box-atd-3">
							<img src="imagens/venda.svg">
						
							<h1>Central de vendas</h1>
							<p>Compre já pela nossa central de vendas</p>
							<p>(31) 3037-6519 (31) 98562-1001</p>
							
				
						</div>
														
					</div>

				</section>
				
					<section class="container_info">
						<div class="container">
						
						<h2>Seu comercio na palma da sua mão!</h2>
						<h3>Os programas da prisma automação comercial são sistemas que irão facilitar a rotina do seu empreendimento.</br>Com uma interface amigável e de fácil operação, nossas soluções foram pensadas de acordo com a necessidade dos clientes, tornando assim, uma excelente opção para o seu empreendimento.</h3>
					</div>
					</section>
					<section class="container-sistem">
						<div class="container">

						<ul>
							<li class="item-box">
							<img src="imagens/config.svg">
							<h2>Configuração de hardware personalizavel</h2>
							<h3>Os programas da Prisma Automação Comercial possuem uma variedade de impressoras, balanças e outros hardwares homologados para trabalhar em perfeito funcionamento.</h3>
						</li>
						<li class="item-box">
							<img src="imagens/transfer.svg">
							<h2>Funciona offline</h2>
							<h3>Afinal, sua loja não pode parar! Os Programas da Prisma Automação Comercial não precisam de Internet para realizar todas as operações básicas do sistema, dessa forma, sua loja não para quando a Internet cai.</h3>
						</li>
						<li class="item-box">
							<img src="imagens/rede.svg">
							<h2>Sistema em rede</h2>
							<h3>Os programas da Prisma automação comercial podem trabalhar em rede simultaneamente onde através de um servidor você tem acesso a todos os outros computadores ligados ao sistema.</h3>
						</li>
						</ul>
					</div>
					</section>
						
					<section class="sistem-sgc">
						<div class="container">
						

							<div id="slider">
										<a href="#" id="prev">&#10094;</a>
										<a href="#" id="next">&#10095;</a>

										<ul>
											<li class="one" style="background-image:url(slides/1.jpg);">
												<div class="box-w">
												<div class="row"><h1>Sistema de Gerenciamento Comercial SGC 2.1</h1></div>
												</div>
											</li>
											<li class="two" style="background-image:url(slides/2.jpg);">
												<div class="box-w">
												<div class="row"><h1>Sistema de Gerenciamento Comercial SGC TEC V3.0</h1></div>
												
											</div>
											</li>
											<li class="three" style="background-image:url(slides/3.jpg);">
												<div class="box-w">
												<div class="row"><h1>TRABALHAMOS COM DESENVOLVIMENTO DE SISTEMAS CUSTOMIZÁVEIS.</h1></div>
												
											</div>
											</li>
										</ul>

									</div>

									
					</div>

					</section>



				<section class="news">
					<div class="container">
						
					
					<h2 class="blog">Notícias</h2>
					<h3>Fique por dentro de tudo que a prisma está preparando para você.</h3>

					<article class="noticia1">
						<div class="title-notice img-notice1">							
						</div>
							<h2>Prisma Automação na Autocom</h2>
							<h3>A Prisma Automação Comercial, marcou presença na maior feira de automação comercial do Brasil.</h3>
							<button class="btn"><a href="noticia.php">Leia Mais</a></button>
					</article>

					<article class="noticia1">
						<div class="title-notice img-notice2">
					</div>
							<h2>Mudanças do Suporte</h2>
							<h3>Com o intuito de melhorar cada vez mais o atendimento, a prisma está realizando mudanças no suporte.</h3>
							<button class="btn"><a href="#">Leia Mais</a></button>		
				</div>			
				</article>
					<div class="container">
					<article class="noticia1">
						<div class="title-notice img-notice3">
					</div>
						<h2>Novos produtos no forno</h2>
						<h3>2019 está aproximando e novos produtos serão apresentados.</h3>
						<button class="btn"><a href="#">Leia Mais</a></button>
					</article>

					<article class="noticia1">
						<div class="title-notice img-notice4">
					</div>
						<h2>Programa de Qualidade</h2>
						<h3>A Prisma está buscando em metodologias internacionais, padrões de qualidade para implantar na empresa.</h3>
						<button class="btn"><a href="#">Leia Mais</a></button>
					</article>
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
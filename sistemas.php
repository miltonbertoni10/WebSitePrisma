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
						
						<h1>Softwares</h1>
						<h3 class="h3-t">Conheça todos os nossos softwares</h3>
					</div>
				
				</section>
					
					<section class="sistemas-list">


						<div class="container">
							<h2>Sistema PRISMA SGC</h2>
						<h3>
							O programa PRISMA SGC é sistema de gerenciamento comercial não fical criado para usuários não obrigados a emissão de documentos fiscais. possui inúmeros recursos de gestão administrativa e de controle. </br>Navegue abaixo nas suas principais telas e conheça-o.</h3>

			<div class="funcao-sistema">

<div class="tab">
  <button class="tablinks" onclick="openbtn(event, 'vendas-tec')">
  	<img src="imagens/caixavenda.svg">
	<span class="tooltiptext">Vendas</span>
</button>
  <button class="tablinks" onclick="openbtn(event, 'estoque-tec')">
  	<img src="imagens/estoque.svg"> 
	<span class="tooltiptext">Estoque</span>
  </button>
  <button class="tablinks" onclick="openbtn(event, 'clientes-tec')">
  	<img src="imagens/clientes.svg">
	<span class="tooltiptext">Clientes</span>
  </button>
  <button class="tablinks" onclick="openbtn(event, 'caixa-tec')">
  	<img src="imagens/caixa.svg">
	<span class="tooltiptext">Caixa</span>
  </button>
  <button class="tablinks" onclick="openbtn(event, 'relatorios-tec')">
  	<img src="imagens/relatorio.svg">
	<span class="tooltiptext">Relatorios</span>
  </button>
  <button class="tablinks" onclick="openbtn(event, 'delivery-tec')">
  	<img src="imagens/delivery.svg">
	<span class="tooltiptext">Delivery</span>
  </button>
  <button class="tablinks" onclick="openbtn(event, 'contas-tec')">
  	<img src="imagens/conta.svg">
	<span class="tooltiptext">Contas</span>
  </button>
</div>

<div id="vendas-tec" class="tabcontent">
  <p><img src="Imagens/vendas.png"></p>
  <div class="cont-tela">
  	 <h3>Caixa</h3>
  	 <p>aaaaaaaaaaaaaaaaaadddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaaddddddddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssss</p>
  </div>
</div>

<div id="estoque-tec" class="tabcontent">
  <p><img src="Imagens/img-sistema-estoque.jpg"></p>
  <div class="cont-tela">
  	 <h3>Caixa</h3>
  	 <p>aaaaaaaaaaaaaaaaaadddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaaddddddddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssss</p>
  </div>
</div>

<div id="clientes-tec" class="tabcontent">
  <p><img src="Imagens/img-sistema-caixa.jpg"></p>
  <div class="cont-tela">
  	 <h3>Caixa</h3>
  	 <p>aaaaaaaaaaaaaaaaaadddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaaddddddddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssss</p>
  </div>
</div>
<div id="caixa-tec" class="tabcontent">
  <p><img src="Imagens/img-sistema-caixa.jpg"></p>
  <div class="cont-tela">
  	 <h3>Caixa</h3>
  	 <p>aaaaaaaaaaaaaaaaaadddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaaddddddddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssss</p>
  </div>
 
</div>

<div id="relatorios-tec" class="tabcontent">
  <p><img src="Imagens/img-sistema-caixa.jpg"></p>
  <div class="cont-tela">
  	 <h3>Caixa</h3>
  	 <p>aaaaaaaaaaaaaaaaaadddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaaddddddddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssss</p>
  </div>
</div>

<div id="delivery-tec" class="tabcontent">
  <p><img src="Imagens/img-sistema-delivery.png"></p>
  <div class="cont-tela">
  	 <h3>Caixa</h3>
  	 <p>aaaaaaaaaaaaaaaaaadddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaaddddddddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssss</p>
  </div>
</div>

<div id="contas-tec" class="tabcontent">
  <p><img src="Imagens/img-sistema-caixa.jpg"></p>
  <div class="cont-tela">
  	 <h3>Caixa</h3>
  	 <p>aaaaaaaaaaaaaaaaaadddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaaddddddddddddddd</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssssss</p>
  	 <p>aaaaaaaaaaaaaaaaaasssssssssssss</p>
  </div>
</div>

						
					</div>
							
					</section>
			
<section class="sistemas-list">


	<div class="container link-l">
	<h2>Sistema PRISMA SGCTEC</h2>
	<h3>
	O programa PRISMA SGCTEC é um sistema de gerenciamento comercial técnico, além  de funções iguais ao programa PRISMA SGC contempla funções específicas para empreendimentos que trabalham com assistência técnica. Pode ser ser usado por empresas não obrigados a emissão de documentos fiscais ou somente como retaguarda.</br>Navegue abaixo nas suas princiapais telas e conheça-o.</h3>

			<div class="funcao-sistema">

<div class="tab">
  <button class="tablinks" onclick="openbtn(event, 'vendas')">
  	<img src="imagens/caixavenda.svg">
	<span class="tooltiptext">Vendas</span>
</button>
  <button class="tablinks" onclick="openbtn(event, 'estoque')">
  	<img src="imagens/ordservice.svg"> 
	<span class="tooltiptext">Ord Serviços</span>
  </button>
  <button class="tablinks" onclick="openbtn(event, 'clientes')">
  	<img src="imagens/clientes.svg">
	<span class="tooltiptext">Clientes</span>
  </button>
  <button class="tablinks" onclick="openbtn(event, 'caixa')">
  	<img src="imagens/caixa.svg">
	<span class="tooltiptext">Caixa</span>
  </button>
  <button class="tablinks" onclick="openbtn(event, 'relatorios')">
  	<img src="imagens/boletos.svg">
	<span class="tooltiptext">Boletos</span>
  </button>
  <button class="tablinks" onclick="openbtn(event, 'delivery')">
  	<img src="imagens/notas.svg">
	<span class="tooltiptext">Pag Notas</span>
  </button>
  <button class="tablinks" onclick="openbtn(event, 'contas')">
  	<img src="imagens/chamados.svg">
	<span class="tooltiptext">Chamados</span>
  </button>
</div>

<div id="vendas" class="tabcontent">
  <h3>Vendas</h3>
  <p>vvvvvvv</p>
</div>

<div id="estoque" class="tabcontent">
  <h3>Estoque</h3>
  <p>eeeee</p> 
</div>

<div id="clientes" class="tabcontent">
  <h3>Clientes</h3>
  <p>ccccc</p>
</div>
<div id="caixa" class="tabcontent">
  <h3>Caixa</h3>
  <p>cccc</p>
</div>

<div id="relatorios" class="tabcontent">
  <h3>Relatorios</h3>
  <p>rrrr</p>
</div>

<div id="delivery" class="tabcontent">
  <h3>Delivery</h3>
  <p>ddddd</p>
</div>

<div id="contas" class="tabcontent">
  <h3>Contas</h3>
  <p>cccsss</p>
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
</script>

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
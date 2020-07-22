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
        <meta name="keywords" content="Empresa Automação Comercial, venda de equipamentos,vendas">
        <link rel="icon" href="imagens/icon.png" type="image/x-icon" />
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
                <a href="index.html" title="Prisma Automação Comercial"><img src="imagens/logo.png"></a>
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
              <li><a  href="home.php">Início</a></li>
              <li><a  href="sistemas.php">Softwares</a></li>
              <li><a  href="downloads.php">Downloads</a></li>
              <li><a  href="empresa.php">A empresa</a></li>
              <li><a  href="trabalhe-conosco.php">Trabalhe Conosco</a></li>
            </ul>
          </nav>
        
        </header>
       <?php 
       $admin = 1;
       $painel = 'admin.php';
          if($admin == $dados['admin']):
            echo "<div class='pain_admin'> <h3> Painel Administrativo</h3></br> <a href='$painel'> Acessar</a> </div>";
          endif;
          if($admin != $dados['admin']):
          endif;

       ?>

       
        <div class="container">
          <div class="info_cliente">
            <h2>Informações Importantes</h2>

            <?php
           $meses = array(
            '01'=>'janeiro',
            '02'=>'fevereiro',
            '03'=>'marco',
            '04'=>'abril',
            '05'=>'maio',
            '06'=>'junho',
            '07'=>'julho',
            '08'=>'agosto',
            '09'=>'setembro',
            '10'=>'outubro',
            '11'=>'novembro',
            '12'=>'dezembro'
        );

          $m = $meses[date('m')];
          if ($m == 'janeiro') {
            $sql = "SELECT janeiro, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          if ($m == 'fevereiro') {
            $sql = "SELECT fevereiro, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          if ($m == 'marco') {
            $sql = "SELECT marco, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          if ($m == 'abril') {
            $sql = "SELECT abril, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          if ($m == 'maio') {
            $sql = "SELECT maio, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          if ($m == 'junho') {
            $sql = "SELECT junho, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          if ($m == 'julho') {
            $sql = "SELECT julho, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          if ($m == 'agosto') {
            $sql = "SELECT agosto, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          if ($m == 'setembro') {
            $sql = "SELECT setembro, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          if ($m == 'outubro') {
            $sql = "SELECT outubro, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          if ($m == 'novembro') {
            $sql = "SELECT novembro, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          if ($m == 'dezembro') {
            $sql = "SELECT dezembro, id_usuario FROM senha_mes WHERE id_usuario = '$id'";
          }
          $sqluser = "SELECT nome, comercio, cnpj_cpf FROM usuarios WHERE id = '$id'";
          if(mysqli_query($connect, $sqluser)):
                $resultado = mysqli_query($connect, $sqluser);
                $dadosuser = mysqli_fetch_array($resultado);
                echo "<p>Nome: ". $dadosuser['nome']."<p>Comercio: ". $dadosuser['comercio'] . "</p> <p>CNPJ/CPF: ". $dadosuser['cnpj_cpf'] ."</p>";
              endif;
          if(mysqli_query($connect, $sql)):
                $resultado = mysqli_query($connect, $sql);
                $dados = mysqli_fetch_array($resultado);
                
                if(!empty($dados[$m])):
                  echo "<p>Sua senha de validação é: $dados[$m] </p>";
          endif;

            if($dados[$m] == NUll or $dados[$m] == 0):
                  echo " <h3>Encontramos inconsistências no seu cadastro!</br>Entre em contato! (31) 98562-1001</h3>";
                endif;

              endif;
          ?>

          
          </div>
       </div>
     
         
            
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
              <h2>Noticia 1</h2>
              <h3>Fique por dentro de tudo que acontece.</h3>
              <button class="btn"><a href="noticia.php">Leia Mais</a></button>
          </article>

          <article class="noticia1">
            <div class="title-notice img-notice2">
          </div>
              <h2>Noticia 2</h2>
              <h3>Fique por dentro de tudo que acontece.</h3>
              <button class="btn"><a href="#">Leia Mais</a></button>    
        </div>      
        </article>
          <div class="container">
          <article class="noticia1">
            <div class="title-notice img-notice3">
          </div>
            <h2>Noticia 3</h2>
            <h3>Fique por dentro de tudo que acontece.</h3>
            <button class="btn"><a href="#">Leia Mais</a></button>
          </article>

          <article class="noticia1">
            <div class="title-notice img-notice4">
          </div>
            <h2>Noticia 3</h2>
            <h3>Fique por dentro de tudo que acontece.</h3>
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
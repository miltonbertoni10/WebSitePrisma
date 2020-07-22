<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Contato</title>
        <link rel="icon" href="imagens/icon.png" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="CSS\Estilo.css">
    </head>
    <body>
        <?php
		$nome = $_POST['nome'];
		$email = $_POST['email'];
        $nacionalidade = $_POST['nacionalidade'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $formacao = $_POST['formacao'];
        $experiencia = $_POST['experiencia'];
        $data_envio = date('d/m/Y');
        $hora_envio = date('H:i:s');
		

           
           // Compo E-mail
  $arquivo = "
          <style type='text/css'>
          body {
          margin:0px;
          font-family:Verdane;
          font-size:12px;
          color: #666666;
          }
          a{
          color: #666666;
          text-decoration: none;
          }
          a:hover {
          color: #FF0000;
          text-decoration: none;
          }
          </style>
            <html>
                <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
                    <tr>
                      <td>
          <tr>
                         <td width='500'>Nome:$nome</td>
                        </tr>
                        <tr>
                          <td width='320'>E-mail:<b>$email</b></td>
             </tr>
             <tr>
                          <td width='320'>Nacionalidade:<b>$nacionalidade</b></td>
                        </tr>
              <tr>
                          <td width='320'>Telefone:<b>$telefone</b></td>
                        </tr>
             <tr>
                          <td width='320'>Endereço:$endereco</td>
                        </tr>
                        <tr>
                          <td width='320'>Formação:$formacao</td>
                        </tr>
                        <tr>
                          <td width='320'>Experiencia:<b>$experiencia</b></td>
                        </tr>
                    </td>
                  </tr>  
                  <tr>
                    <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
                  </tr>
                </table>
            </html>
          ";

          //enviar
   
  // emails para quem será enviado o formulário
  $emailenviar = "vendas.michel@gmail.com";
  $destino = $emailenviar;
  $assunto = "Contato pelo Site";
 
  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From:' . $nome . $email;
  //$headers .= "Bcc: $EmailPadrao\r\n";
   
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
  echo "<div class='envia'></h1>E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário</br><h2>Aguarde! Você será redirecionado em instantes...</h2></h1></div>";
  echo " <meta http-equiv='refresh' content='10;URL=trabalhe-conosco.php'>";
  } else {
  echo "<p>ERRO AO ENVIAR E-MAIL!</p></br><h2>Aguarde! Você será redirecionado em instantes...</h2>";
  echo " <meta http-equiv='refresh' content='10;URL=trabalhe-conosco.php'>";
 
  }
        ?>
    </body>
</html>

<?php
	
	require_once 'db_connect.php';

	session_start();
	if(!isset($_SESSION['logado'])):
  	 header('location: admin.php');
  	endif;

//dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dadosuser = mysqli_fetch_array($resultado);

	$mes = mysqli_escape_string($connect, $_POST['mes']);
	if(isset($_POST['btn_importar-senha'])):
		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
		$dados = file($arquivo_tmp);

		foreach ($dados as $linha) {
			$linha = trim($linha);
			$valor = explode(",", $linha); 
			$cnpj_cpf = $valor[0];
			$senha = $valor[1];

			$sql = "SELECT id, cnpj_cpf FROM usuarios WHERE cnpj_cpf = '$cnpj_cpf'";
			$resultado = mysqli_query($connect, $sql);
			$dados = mysqli_fetch_array($resultado);
			if(mysqli_num_rows($resultado) == 1):
				$iduser = $dados['id'];
				echo $iduser;
				$sql_mes = "INSERT INTO senha_mes ($mes, id_usuario ) VALUES ('$senha','$iduser')";
				mysqli_query($connect, $sql_mes);
				header('location: paineladmin.php');
				
			endif;
			}
		
	endif;

	if(isset($_POST['btn-excluir-clientes'])):
	
	$admin = 0;
	$sql_senha = "DELETE FROM usuarios, senha_mes USING usuarios, senha_mes WHERE usuarios.admin = 0 AND senha_mes.id_usuario = usuarios.id";
	$sql_user = "DELETE FROM usuarios WHERE admin = '$admin'";
	if(mysqli_query($connect, $sql_senha)):
		if(mysqli_query($connect, $sql_user)):
			header('location: paineladmin.php');
		endif;
	endif;
	endif;

	if(isset($_POST['btn-importar'])):
	$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
	$dados = file($arquivo_tmp);

	foreach ($dados as $linha) {
		$linha = trim($linha);
		$valor = explode(",", $linha); 

		$nome = $valor[0];
		$cnpj_cpf = $valor[1];
		$comercio = $valor[2];
		$endereco = $valor[3];
		$login = $valor[4];
		$senha = $valor[5];
		$senha = md5($senha);


		$sql ="INSERT INTO usuarios (nome, cnpj_cpf, comercio, endereco, login, senha) VALUES ('$nome', '$cnpj_cpf', '$comercio', '$endereco', '$login', '$senha')";
		$resultado_usuario = mysqli_query($connect, $sql);
	}
	$_SESSION['msg'] = "<p>Dados carregados com sucesso!</p>";
	header('location: paineladmin.php');
endif;

?>
<?php
ob_start();
session_start();
		//verifica se o usuário já está logado no sistema
if (isset($_SESSION['usuarioconecta']) && (isset($_SESSION['senhaconecta']))){
	header ("Location: home.php"); exit;
}

		//LOGAR NO SISTEMA
include ("conecta/conexao.php");
if (isset($_POST['submit'])){
	//RECUPERAR DADOS DO FORM
	$usuario=trim(strip_tags($_POST['usuario']));
	$senha=trim(strip_tags($_POST['senha']));

	//SELECIONAR BANCO DE DADOS
	
	$select = "SELECT * FROM `login` WHERE usuario=:usuario AND senha=:senha";
	try{
		$result = $conexao->prepare($select);
		$result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
		$result->bindParam(':senha', $senha, PDO::PARAM_STR);
		$result->execute();
		$contar = $result->rowCount();
		if($contar==1){
			$usuario=$_POST['usuario'];
			$senha=$_POST['senha'];
			$_SESSION['usuarioconecta'] = $usuario;
			$_SESSION['senhaconecta'] = $senha;
			echo   '<div class="alert alert-success">
    <strong>Sucesso!</strong> Aguarde o redirecionamento.
  </div>';
		header ("Refresh: 3, home.php"); 
		}else{
			echo '  <div class="alert alert-danger">
    <strong>Senha ou usuário inválido!</strong> Tente novamente.
  </div>';
		}		
	}catch(PDOException $e){
		echo $e;
	}
}

?>

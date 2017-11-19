<?php
if(isset($_POST['login'])){
$usuario=trim(strip_tags($_POST['usuario']));

	$select = "SELECT * FROM `login` WHERE usuario=:usuario";
try{
	$result=$conexao->prepare($select);
	$result->bindParam(':usuario', $usuario, PDO::PARAM_INT);
	$result->execute();
	$contar= $result->rowCount();
	if($contar==1){
		$usuario=$_POST['usuario'];
		$_SESSION['usuarioconecta'] = $usuario;
		while ($linha = $result->FETCH(PDO::FETCH_OBJ)) {
			$imagem=$linha->imagem;
			$userLogado=$linha->usuario;
			include("login2.php");
			}
	}else{
		?><script>erro(); </script><?php
	}
}catch(PDOException $e){
		echo $e;
}
}
if (isset($_POST['submit'])){
	//RECUPERAR DADOS DO FORM
	$senha=trim(strip_tags($_POST['senha']));
	$select = "SELECT * FROM `login` WHERE senha=:senha";
	try{
		$result = $conexao->prepare($select);
		$result->bindParam(':senha', $senha, PDO::PARAM_STR);
		$result->execute();
		$contar = $result->rowCount();
		if($contar==1){
					while ($linha = $result->FETCH(PDO::FETCH_OBJ)) {
			$imagem=$linha->imagem;
			$userLogado=$linha->usuario;
					}
			$senha=$_POST['senha'];
			$_SESSION['senhaconecta'] = $senha;

			?><script>ocultar()</script>
					<div class="loginok">
					<div id="box-senha">
					<center><h1>BEM-VINDO</h1>
					<img src="upload/user/<?php 	echo $imagem; ?>"><br>
					<h2><?php echo $userLogado ?></h2><br><br>
					</div></div><?php
					if (isset($_SESSION['usuarioconecta']) && (isset($_SESSION['senhaconecta']))){
						header ("Refresh: 3, home.php"); 
					}		
		}else{
			?><script>erro(); </script><?php
		}		
	}catch(PDOException $e){
		echo $e;
	}
}
?>
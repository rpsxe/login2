<?php
ob_start();
session_start();
include ("conecta/conexao.php");
	//verifica se o usuário já está logado no sistema
if (!isset($_SESSION['usuarioconecta']) && (!isset($_SESSION['senhaconecta']))){
	header ("Location: index.php"); exit;
}if (isset($_SESSION['usuarioconecta']) && (!isset($_SESSION['senhaconecta']))){
	header ("Location: index.php"); exit;
}
if(isset($_REQUEST['sair'])){
	session_destroy();
	session_unset($_SESSION['usuarioconecta']);
	session_unset($_SESSION['senhaconecta']);
	header ("Location: index.php");
}
?>
<?php 
ob_start();
session_start();
include ("conecta/conexao.php");
	//verifica se o usuário já está logado no sistema
if (isset($_SESSION['usuarioconecta']) && (isset($_SESSION['senhaconecta'])))
{
	header ("Location: home.php"); exit;
}
?>
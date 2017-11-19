<?php
	try {
    $conexao = new PDO("mysql:host=localhost;dbname=site_ueb", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

	//AQUI ESTÁ A CONEXÃO COM O BANCO DE DADOS "BANCO_LOGIN"
	// SERÁ RESPONSÁVEL PELOS REGISTROS DE LOGIN
?>
<?php
	$local = "localhost";
	$usuario = "root";
	$senha = "";
	$base_dados = "portal_noticias";

	$mysqli = new mysqli($local, $usuario, $senha, $base_dados);

	if($mysqli -> connect_errno){
		echo "<script> window.alert('ERRO! Na conexão com a base de dados!'); </script>";
		echo "<script> window.location.href = '../../index.php'; </script>";
	}
?>
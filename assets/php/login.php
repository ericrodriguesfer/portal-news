<?php
	include 'conexao.php';

	$email = $_POST['email'];
	$senha = md5(md5($_POST['senha']));

	if(!isset($_SESSION))
		session_start();

	$sql = "SELECT id, email, senha FROM login_administrador WHERE email = '$email'";

	$sql_exec = $mysqli -> query($sql) or die($mysqli -> error);
	$dado = $sql_exec -> fetch_assoc();
	$total = $sql_exec -> num_rows;

	if($total == 0){
		$erro[] = "Este email não esta cadastrado";
		echo "<script> window.alert('Este email não esta cadastrado!'); </script>";
		echo "<script> window.location.href = '../../login.php'; </script>";
	}else{
		if($dado['senha'] == $senha){
			$_SESSION['login_admin'] = $dado['id'];
		}else{
			$erro[] = "Senha incorreta";
			echo "<script> window.alert('Senha incorreta!') </script>"; 
			echo "<script> window.location.href = '../../login.php'; </script>";
		}
	}

	if(count($erro) == 0 || !isset($erro)){
		echo "<script> window.location.href = '../../home.php'; </script>";
	}
?>
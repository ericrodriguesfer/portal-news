<?php
    include 'conexao.php';

    $id_apagar = limpar($_GET['id']);

    $sql = "DELETE FROM noticia WHERE id=$id_apagar";
    $sql_exec = $mysqli -> query($sql) or die($mysqli -> error);

    if($sql_exec == true){
        echo "<script> window.alert('Notícia apagada com sucesso!'); </script>";
        echo "<script> window.location.href = '../../apagar.php'; </script>";
    }

    function limpar($valor){
		global $mysqli;

		$retorno = $mysqli -> escape_string($valor);
		$retorno = htmlspecialchars($retorno);

		return $retorno;
	}
?>
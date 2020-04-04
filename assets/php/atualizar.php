<?php 
    ini_set('default_charset', 'UTF-8');
    include 'conexao.php';

    $mysqli -> query("SET NAMES uft8");

    $id = limpar($_POST['id_noticia']);
    $resumo_titulo = limpar($_POST['resumo_titulo_noticia']);
    $resumo_noticia = limpar($_POST['resumo_noticia']);
    $data = limpar(date("Y/m/d"));
    $titulo_noticia = limpar($_POST['titulo_noticia']);
    $citacao_noticia = limpar($_POST['citacao_noticia']);
    $autor = limpar($_POST['autor_noticia']);
    $hora = limpar($_POST['hora']);
    $noticia = limpar($_POST['texto_noticia']);
    $img = limpar($_POST['foto_noticia']);
    if($img != " "){
        $img_nome = $_FILES['foto_noticia']['name'];
        $img_temp = $_FILES['foto_noticia']['tmp_name'];

        $sql = "UPDATE `noticia` SET `resumo_titulo` = '$resumo_titulo', `resumo_noticia` = '$resumo_noticia', `titulo_noticia` = '$titulo_noticia', `noticia_citacao` = '$citacao_noticia', `noticia_autor` = '$autor', `noticia_imagem` = '$img_nome', `noticia_texto` = '$noticia' WHERE `noticia`.`id` = $id;";
        $sql_exec = $mysqli -> query($sql) or die($mysqli -> error);

        move_uploaded_file($img_temp, "../imagens_noticia/".$img_nome);

        if($sql_exec == true){
            echo "<script> window.alert('Notícia atualizada com sucesso!'); </script>";
            echo "<script> window.location.href = '../../editar.php'; </script>";
        }
    }else{
        $sql = "UPDATE `noticia` SET `resumo_titulo` = '$resumo_titulo', `resumo_noticia` = '$resumo_noticia', `titulo_noticia` = '$titulo_noticia', `noticia_citacao` = '$citacao_noticia', `noticia_autor` = '$autor', `noticia_texto` = '$noticia' WHERE `noticia`.`id` = $id;";
        $sql_exec = $mysqli -> query($sql) or die($mysqli -> error);

        if($sql_exec == true){
            echo "<script> window.alert('Notícia atualizada com sucesso!'); </script>";
            echo "<script> window.location.href = '../../editar.php'; </script>";
        }
    }

    function limpar($valor){
        global $mysqli;

        $retorno = $mysqli -> escape_string($valor);
        $retorno = htmlspecialchars($retorno);

        return $retorno;
    }
?>

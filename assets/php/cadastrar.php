<?php
    ini_set('default_charset', 'UTF-8');
    include 'conexao.php';

    $mysqli -> query("SET NAMES uft8");

    $resumo_titulo = $_POST['resumo_titulo_noticia'];
    $resumo_noticia = $_POST['resumo_noticia'];
    $data = date("Y/m/d");
    $titulo_noticia = $_POST['titulo_noticia'];
    $citacao_noticia = $_POST['citacao_noticia'];
    $autor = $_POST['autor_noticia'];
    $hora = $_POST['hora'];
    $img_nome = $_FILES['foto_noticia']['name'];
    $img_temp = $_FILES['foto_noticia']['tmp_name'];
    $noticia = $_POST['texto_noticia'];

    $sql = "INSERT INTO `noticia` (`id`, `resumo_titulo`, `resumo_noticia`, `titulo_noticia`, `noticia_citacao`, `noticia_data_postagem`, `noticia_hora_postagem`, `noticia_autor`, `noticia_imagem`, `noticia_texto`) VALUES (NULL, '$resumo_titulo', '$resumo_noticia', '$titulo_noticia', '$citacao_noticia', '$data', '$hora', '$autor', '$img_nome', '$noticia');";
    $sql_exec = $mysqli -> query($sql) or die($mysqli -> error);
    
    move_uploaded_file($img_temp, "../imagens_noticia/".$img_nome);

    if($sql_exec == true){
        echo "<script> window.alert('Notícia cadastrada com sucecco!'); </script>";
        echo "<script> window.location.href = '../../cadastar_noticia.php'; </script>";
    }
?>
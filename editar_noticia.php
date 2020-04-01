<?php
    session_start();

    if(!isset($_SESSION['login_admin'])){
        echo "<script> window.alert('Efetue o login de administrador!'); </script>";
        echo "<script> window.location.href = 'login.php'; </script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Portal News</title>
        <link rel="shortcut icon" href="assets/img/noticia_icon.png">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/Contact-Form-Clean-1.css">
        <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
        <link rel="stylesheet" href="assets/css/Features-Boxed-1.css">
        <link rel="stylesheet" href="assets/css/Features-Boxed.css">
        <link rel="stylesheet" href="assets/css/Footer-Clean.css">
        <link rel="stylesheet" href="assets/css/Login-Form-Clean-1.css">
        <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
        <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
        <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
        <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <div>
            <nav class="navbar navbar-light navbar-expand-md shadow navigation-clean-button">
                <div class="container"><a class="navbar-brand" href="home.php">Portal News</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item" role="presentation"></li>
                            <li class="nav-item" role="presentation"></li>
                        </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="editar.php">Voltar</a></span></div>
                </div>
            </nav>
        </div>
        <div class="features-boxed">
            <div class="container">
                <div class="intro"></div>
            </div>
        </div>
        <div class="footer-clean">
            <div class="row register-form">
                <div class="col-md-8 offset-md-2">
                    <?php
                        include 'assets/php/conexao.php';

                        $id_noticia = $_GET['id'];

                        $sql = "SELECT * FROM noticia WHERE id=$id_noticia";
                        $sql_exec = $mysqli -> query($sql) or die($mysqli -> error);
                        $dados = $sql_exec -> fetch_assoc();
                    ?>
                    <form class="shadow custom-form" method="post" action="assets/php/atualizar.php" enctype="multipart/form-data">
                        <h1>Editar notícia</h1>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Id da notícia</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text" name="id_noticia" value="<?php echo $dados['id']; ?>" required="" readonly=""></div>
                        </div>
                        <fieldset>
                            <legend>Dados da miniatura da notícia</legend>
                        </fieldset>
                        <fieldset></fieldset>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Resumo do título da notícia</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text" name="resumo_titulo_noticia" placeholder="Digite o resumo do título da notícia" value="<?php echo $dados['resumo_titulo']; ?>" required=""></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Resumo da notícia</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text" name="resumo_noticia" placeholder="Digite o resumo da notícia" value="<?php echo $dados['resumo_noticia']; ?>" required=""></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Data atual</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text" name="data" placeholder="Digite a data atual" value="<?php echo date("d/m/Y"); ?>" readonly="" required=""></div>
                        </div>
                        <fieldset>
                            <legend>Dados do corpo da notícia</legend>
                        </fieldset>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Título da notícia</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text" name="titulo_noticia" placeholder="Digite o título da notícia" value="<?php echo $dados['titulo_noticia']; ?>" required=""></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Citação ou trecho da notícia</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text" name="citacao_noticia" placeholder="Digite um trecho ou citação da notícia" value="<?php echo $dados['noticia_citacao']; ?>" required=""></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Autor da notícia</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text" name="autor_noticia" placeholder="Digite o autor da notícia" value="<?php echo $dados['noticia_autor']; ?>" required=""></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Hora atual</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text" name="hora" placeholder="Digite a hora atual" value="<?php date_default_timezone_set('America/Fortaleza'); echo date("H:i:s"); ?>" readonly="" required=""></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Imagem da notícia</label></div>
                            <div class="col-sm-6 text-left input-column"><a class="btn btn-primary btn_imagem" role="button" target="_blank" href="visualizar_imagem.php?id=<?php echo $dados['id']; ?>">Visualizar imagem</a></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Imagem da notícia</label></div>
                            <div class="col-sm-6 input-column"><input type="file" style="width: 360px;" name="foto_noticia"></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Notícia</label></div>
                            <div class="col-sm-6 input-column"><textarea class="form-control" style="height: 200px;width: 360px;" name="texto_noticia" placeholder="Digite a sua notícia" required=""><?php echo $dados['noticia_texto']; ?></textarea></div>
                        </div><button class="btn btn-light submit-button" type="submit">Salvar alterações</button></form>
                </div>
            </div>
            <footer>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-4 col-md-3 text-justify item">
                            <h3>Serviços</h3>
                            <ul>
                                <li><a href="#">Informativo</a></li>
                                <li><a href="#">Anúncios</a></li>
                                <li><a href="#">Dados em base</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3 text-justify item">
                            <h3>Sobre</h3>
                            <ul>
                                <li><a href="#">Notícias</a></li>
                                <li></li>
                                <li><a href="#">Realidade</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3 text-justify item">
                            <h3>Proprietários</h3>
                            <ul>
                                <li><a href="#">João da Costa</a></li>
                                <li><a href="#">Irineu da Silva</a></li>
                                <li><a href="#">Sebartião Sousa</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 text-justify item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-youtube"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                            <p class="text-justify copyright">Portal News © 2020 | Todos os direitod reservados</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
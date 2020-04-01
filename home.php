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
                <div class="container"><a class="navbar-brand" href="#">Portal News</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item" role="presentation"></li>
                            <li class="nav-item" role="presentation"></li>
                        </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="assets/php/logout.php">Sair</a></span></div>
                </div>
            </nav>
        </div>
        <div class="features-boxed">
            <div class="container">
                <div class="intro"></div>
            </div>
        </div>
        <div class="features-boxed">
            <div class="container">
                <div class="intro"></div>
                <div class="row justify-content-center features">
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="shadow box"><i class="fa fa-file-o icon"></i>
                            <h3 class="name">Adicionar notícias</h3><a class="learn-more" href="cadastar_noticia.php">Acessar adição</a></div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="shadow box"><i class="fa fa-edit icon"></i>
                            <h3 class="name">Editar notícias</h3><a class="learn-more" href="editar.php">Acessar edição</a></div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="shadow box"><i class="fa fa-trash-o icon"></i>
                            <h3 class="name">Apagar notícias</h3><a class="learn-more" href="apagar.php">Acessar remoção</a></div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="shadow box"><i class="fa fa-th-list icon"></i>
                            <h3 class="name">Visualizar notícias</h3><a class="learn-more" href="visualizar_noticia.php">Acessar visualização</a></div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="shadow box"><i class="fa fa-bar-chart icon"></i>
                            <h3 class="name">Visualizar estatísticas</h3><a class="learn-more" href="estatistica.php">Acessar estatísticas</a></div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="shadow box"><i class="fa fa-eye icon"></i>
                            <h3 class="name">Visualizar site</h3><a class="learn-more" href="visualizar.php">Acessar site</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-clean">
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
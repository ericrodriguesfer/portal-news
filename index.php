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
                <div class="container"><a class="navbar-brand" href="index.php">Portal News</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item" role="presentation"></li>
                            <li class="nav-item" role="presentation"></li>
                        </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="login.php">Acessar</a></span></div>
                </div>
            </nav>
        </div>
        <div class="features-boxed">
            <div class="container">
                <div class="intro"></div>
                <div class="row justify-content-center features">
                    <?php 
                        include 'assets/php/conexao.php';

                        $sql = "SELECT * FROM noticia ORDER BY id DESC";
                        $sql_exec = $mysqli -> query($sql) or die($mysqli -> error);
                        $exibir = $mysqli -> affected_rows;
                        $dados = $sql_exec -> fetch_assoc();

                        if($exibir > 0){
                            do{
                    ?>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="shadow box">
                            <h3 class="name"><?php echo $dados['resumo_titulo']; ?></h3>
                            <p class="text-justify description"><?php echo $dados['resumo_noticia']; ?></p><a class="learn-more btn-acessar" href="noticia.php?id=<?php echo $dados['id']; ?>">Acessar notícia</a><br><p class="data-texto"><?php echo date("d/m/Y", strtotime($dados['noticia_data_postagem'])); ?></p></div>
                    </div>
                    <?php
                            }while($dados = $sql_exec -> fetch_assoc());
                        }else{
                    ?>
                    <h2>Não há notícias cadastradas!</h2>
                    <?php
                        }
                    ?>
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
<!--<input class="form-control-plaintext" type="text" value="<?php echo date("d/m/Y", strtotime($dados['noticia_data_postagem'])); ?>"
                                readonly="">-->
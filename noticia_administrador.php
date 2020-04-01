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
                        </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="visualizar.php">Voltar a seleção de notícias</a></span></div>
                </div>
            </nav>
        </div>
        <div class="features-boxed">
            <div class="container">
                <div class="intro"></div>
            </div>
        </div>
        <div class="shadow contact-clean">
            <?php
                include 'assets/php/conexao.php';
               
                $id_consulta = $_GET['id'];

                $sql = "SELECT * FROM noticia WHERE id = $id_consulta";
                $sql_exec = $mysqli -> query($sql) or die($mysqli -> error);
                $dados = $sql_exec -> fetch_assoc();
            ?>
            <form class="shadow" method="post">
                <h1 class="text-justify"><strong><?php echo $dados['titulo_noticia']; ?></strong><br></h1>
                <hr>
                <div class="form-group">
                    <p></p>
                </div>
                <div class="form-group">
                    <p class="lead text-justify"><?php echo $dados['noticia_citacao']; ?><br></p>
                </div>
                <hr>
                <div class="form-group">
                    <h6 class="text-right"><strong>Por <?php echo $dados['noticia_autor']; ?></strong><br></h6>
                </div>
                <div class="form-group">
                    <h6 class="text-right"><?php echo date("d/m/Y", strtotime($dados['noticia_data_postagem'])); ?> - <?php echo $dados['noticia_hora_postagem']; ?><br></h6>
                </div>
                <hr>
                <div class="form-group"><img class="img-noticia" src="assets/imagens_noticia/<?php echo $dados['noticia_imagem']; ?>" style="width: 920px;"></div>
                <?php
                    $noticia = $dados['noticia_texto'];
                    $paragrafos = explode('@', $noticia);

                    foreach($paragrafos as $texto){
                ?>
                <div class="form-group text-justify">
                    <p class="texto"><?php echo $texto; ?><br></p>
                </div>
                <?php
                    }
                ?>
                <hr>
                <div class="form-group text-right"><a href="visualizar.php">Retornar a seleção de notícias</a></div>
            </form>
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
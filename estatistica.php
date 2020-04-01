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
                        </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="home.php">Voltar</a></span></div>
                </div>
            </nav>
        </div>
        <div class="features-boxed">
            <div class="container">
                <div class="intro"></div>
            </div>
        </div>
        <div class="contact-clean">
            <form class="shadow visualizador-imagem" method="post">
                <h1 class="text-justify">Relatório de cadastro de notícias</h1>
                <hr>
                <div class="form-group text-center">
                    <canvas class="grafico_estatistica">
                    
                    </canvas>
                    <?php
                        include 'assets//php/conexao.php';

                        $sql = "SELECT * FROM noticia ORDER BY noticia_data_postagem DESC";
                        $sql_exec = $mysqli -> query($sql) or die($mysqli -> error);
                        $exibir = $mysqli -> affected_rows;
                        $dados = $sql_exec -> fetch_assoc();

                        if($exibir > 0){
                            do{
                                $anos[] = date("Y", strtotime($dados['noticia_data_postagem']));
                            }while($dados = $sql_exec -> fetch_assoc());

                            for($i = 0;$i < count($anos);$i++){
                                if($i == count($anos) - 1){
                                    $anos_copia[] = $anos[$i];
                                    break;
                                }else{
                                    if($anos[$i] != $anos[$i + 1]){
                                        $anos_copia[] = $anos[$i];
                                    }
                                }
                            }
                    ?>
                    <script src="assets/js/chart.js"></script>
                    <script>
                        var ctx = document.getElementsByClassName("grafico_estatistica");
                        var chartGraph = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ["Janeiro", "Fevereio", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outobro", "Novembro", "Dezembro",],
                                datasets: [
                                <?php
                                    for($i = 0;$i < count($anos_copia);$i++){
                                        $qtd_meses = [
                                            "Janeiro" => 0,
                                            "Fevereiro" => 0,
                                            "Março" => 0,
                                            "Abril" => 0,
                                            "Maio" => 0,
                                            "Junho" => 0,
                                            "Julho" => 0,
                                            "Agosto" => 0,
                                            "Setembro" => 0,
                                            "Outobro" => 0,
                                            "Novembro" => 0,
                                            "Dezembro" => 0,
                                        ];

                                        $sql_2 = "SELECT * FROM noticia WHERE YEAR(noticia_data_postagem) = $anos_copia[$i]";
                                        $sql_exec_2 = $mysqli -> query($sql_2) or die($mysqli -> error);
                                        $dados_2 = $sql_exec_2 -> fetch_assoc();

                                        do{
                                            $meses[] = intval(date("m", strtotime($dados_2['noticia_data_postagem'])));
                                        }while($dados_2 = $sql_exec_2 -> fetch_assoc());

                                        sort($meses);

                                        $meses_copia = array_count_values($meses);

                                        for($j = 0;$j < count($meses);$j++){
                                            $meses[$j] = 0;
                                        }

                                        foreach($meses_copia as $chave => $valor){
                                            if($chave == 1){
                                                $qtd_meses["Janeiro"] = $valor;
                                            }else if($chave == 2){
                                                $qtd_meses["Fevereiro"] = $valor;
                                            }else if($chave == 3){
                                                $qtd_meses["Março"] = $valor;
                                            }else if($chave == 4){
                                                $qtd_meses["Abril"] = $valor;
                                            }else if($chave == 5){
                                                $qtd_meses["Maio"] = $valor;
                                            }else if($chave == 6){
                                                $qtd_meses["Junho"] = $valor;
                                            }else if($chave == 7){
                                                $qtd_meses["Julho"] = $valor;
                                            }else if($chave == 8){
                                                $qtd_meses["Agosto"] = $valor;
                                            }else if($chave == 9){
                                                $qtd_meses["Setembro"] = $valor;
                                            }else if($chave == 10){
                                                $qtd_meses["Outobro"] = $valor;
                                            }else if($chave == 11){
                                                $qtd_meses["Novembro"] = $valor;
                                            }else if($chave == 12){
                                                $qtd_meses["Dezembro"] = $valor;
                                            }
                                        }

                                        foreach($qtd_meses as $chave => $valor){
                                            $chave = 0;
                                        }
                                ?>
                                    {
                                        label: "Cadastratos de noticia em " + <?php echo $anos_copia[$i]; ?>,
                                        data: [<?php echo $qtd_meses["Janeiro"]; ?>, <?php echo $qtd_meses["Fevereiro"]; ?>, <?php echo $qtd_meses["Março"]; ?>, <?php echo $qtd_meses["Abril"]; ?>, <?php echo $qtd_meses["Maio"]; ?>, <?php echo $qtd_meses["Junho"]; ?>, <?php echo $qtd_meses["Julho"]; ?>, <?php echo $qtd_meses["Agosto"]; ?>, <?php echo $qtd_meses["Setembro"]; ?>, <?php echo $qtd_meses["Outobro"]; ?>, <?php echo $qtd_meses["Novembro"]; ?>, <?php echo $qtd_meses["Dezembro"]; ?>],
                                        borderWidth: 6,
                                        borderColor: gera_cor(),
                                        backgroundColor: 'transparent'
                                    },
                                <?php
                                    }
                                ?>
                                ]
                            },
                            options: {
                                title: {
                                    display: true,
                                    fontSize: 20,
                                    text: "Relatório de cadastro de notícias"
                                },
                                labels: {
                                    fontStyle: "bold"
                                }
                            }
                        });

                        function gera_cor(){
                            var hexadecimais = '0123456789ABCDEF';
                            var cor = '#';
                        
                            for (var i = 0; i < 6; i++ ) {
                                cor += hexadecimais[Math.floor(Math.random() * 16)];
                            }
                            
                            return cor;
                        }
                    </script>
                    <?php
                        }else{
                    ?>
                    <center><h2>Não há notícias cadastradas!</h2></center>
                    <?php
                        }
                    ?>
                </div>
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
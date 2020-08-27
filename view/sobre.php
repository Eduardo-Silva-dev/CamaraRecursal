<?php session_start();
require_once "../Repository/login/protect.php";
protect(); ?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../lib/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../lib/select2/css/select2.css">
    <link rel="stylesheet" type="text/css" href="../lib/css/menu.css">
    <script src="../lib/jquery-3.2.1.min.js"></script>
    <script src="../lib/alertifyjs/alertify.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <script src="../lib/select2/js/select2.js"></script>
    <script src="../js/funcoes.js"></script>
</head>

<body>
    <div id="nav">
        <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <img src="../img/marca_procon.jpg" width="100px" height="70px" class="d-inline-block align-top" alt="">
                    <ul class="nav navbar-nav navbar-right">
                        <!--deixa os ícones do menu posicionados à direita -->
                        <li class="active"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span>
                                Inicio</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Consultas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="http://procon.pb.gov.br/camararecursal/decisoes">Decisões Proferidas</a>
                                </li>
                                <li><a href="http://procon.pb.gov.br/camararecursal/pautas">Pautas das Câmaras
                                        Recursais</a></li>
                            </ul>
                        </li>
                        </li>
                        <li><a href="sobre.php"><span class="glyphicon glyphicon-home"></span>
                                Sobre</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" style="color: red" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>
                                Usuario: <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if ($_SESSION['camara'] == 0) : ?>
                                    <li> <a href="usuarios/usuarios.php"><span class="glyphicon glyphicon-off"></span> Gestão Usuários</a></li>
                                <?php endif; ?>
                                <li> <a href="usuarios/relatores.php"><span class="glyphicon glyphicon-user"></span> Relatores</a></li>
                                <li> <a style="color: red" href="../Repository/login/validacaoUser.php?logout"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.contatiner -->
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="container" style="margin-top: 20px;">

        <div class="jumbotron">
            <h1 class="display-4">Câmaras Recursais</h1>
            <p class="lead">Competência</p>
            <hr class="my-4">
            <p> Compete a cada Câmara Recursal, no âmbito de sua competência, assessorar o
                Superintendente do órgão no processamento e julgamento de recursos de decisões proferidas pela
                Assessoria Jurídica, bem como de outras ações ou recursos que a lei pertinente à espécie lhes
                atribuir
                competência. Esta competência abrange quaisquer matérias que tratem de relação de consumo</p>
        </div>
        <br>
        <hr>
        <div class="row" style="margin-left:70px!important;">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">1ª Câmara Recursal</h3>
                        <hr>
                        <p class="card-text">
                            <p>DEMÉTRIUS FAUSTINO DE SOUZA - PRESIDENTE</p>
                            <p>ANTONIO FELIPE LEITE SOUTO FALCÃO - MEMBRO</p>
                            <p>CYRO CESAR PALITOT REMÍGIO ALVES - MEMBRO</p>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">2ª Câmara recursal</h3>
                        <hr>
                        <p class="card-text">
                            <p>JULIANA QUEIROZ DE SÁ E BENEVIDES - PRESIDENTE</p>
                            <p>SÉRGIO JOSÉ SANTOS FALCÃO - MEMBRO</p>
                            <p>FERNANDO LIMA DE OLIVEIRA - MEMBRO</p>
                        </p>

                    </div>
                </div>
            </div>
        </div>




        <br>
    </div>
    </div>
    <!--div que carrega do lado direito da página e recebe os valores digitados do lado esquerdo. Note que uma tem col-sm-4 e a outra col-sm-8, o que soma 12-->
    <div class="col-sm-8">
        <div id="tabelaProcessosLoad"></div>
    </div>
    </div>
    </div>
</body>
<?php require_once "templates/footer.php"; ?>

</html>
<script type="text/javascript">
    $(window).scroll(function() {
        if ($(document).scrollTop() > 150) {
            $('.logo').width(100);
            $('.logo').height(60);
        } else {
            $('.logo').height(100);
            $('.logo').width(150);
        }
    });
</script>
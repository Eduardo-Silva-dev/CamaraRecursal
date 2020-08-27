<?php
require_once "../../Repository/login/protecte.php";
protect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="../../lib/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../../lib/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../lib/select2/css/select2.css">
    <link rel="stylesheet" type="text/css" href="../../lib/css/menu.css">
    <script src="../../lib/jquery-3.2.1.min.js"></script>
    <script src="../../lib/alertifyjs/alertify.js"></script>
    <script src="../../lib/bootstrap/js/bootstrap.js"></script>
    <script src="../../lib/select2/js/select2.js"></script>
    <script src="../../js/funcoes.js"></script>
    <title>Document</title>
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
                        <li class="active"><a href="../inicio.php"><span class="glyphicon glyphicon-home"></span>
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
                        <li><a href="../view/sobre.php"><span class="glyphicon glyphicon-home"></span>
                                Sobre</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" style="color: red" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>
                                Usuario: <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php //if ($_SESSION['usuario'] == "admin") : 
                                ?>
                                <li> <a href="usuarios/usuarios.php"><span class="glyphicon glyphicon-off"></span> Gestão
                                        Usuários</a></li>
                                <?php // endif; 
                                ?>
                                <li> <a style="color: red" href="../../Repository/login/validacaoUser.php?logout"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.contatiner -->
        </div>
    </div>
</body>

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
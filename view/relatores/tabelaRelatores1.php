<?php
require_once "../../conexao/conexao.php";
require_once "../../Repository/processos/relatorioTotal.php";
require_once "../../Repository/login/protecte.php";
protect();
$c = new conectar();
$conexao = $c->conexao();
session_start();
$filtro = $_GET['filtro'];
$filtro1 = $_GET['filtro1'];
$cam = $_GET['cam'];
?>
<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../lib/alertifyjs/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../lib/select2/css/select2.css">
<link rel="stylesheet" type="text/css" href="../../lib/css/menu.css">
<script src="../../lib/jquery-3.2.1.min.js"></script>
<script src="../../lib/alertifyjs/alertify.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.js"></script>
<script src="../../lib/select2/js/select2.js"></script>
<script src="../../js/funcoes.js"></script>

<head>
    <title>relatores</title>
</head>

<body>
    <div class="container">
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
                        <img src="../../img/marca_procon.jpg" width="100px" height="70px" class="d-inline-block align-top" alt="">
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
                                        <li> <a href="../usuarios/usuarios.php"><span class="glyphicon glyphicon-off"></span> Gestão Usuários</a></li>
                                    <?php endif; ?>
                                    <li> <a href="../usuarios/relatores.php"><span class="glyphicon glyphicon-user"></span> Relatores</a></li>
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
        <br><br><br><br>
        <div class="container">
            <h1>Relatores</h1>
            <div class="row">
                <div class="col-sm-10">
                    <div id="tabelaRelatoresLoad"></div>
                    <table>
                        <table class="table table-hover" style="text-align: center;">
                            <caption><label>Total por Relator</label></caption>
                            <tr>
                                <td>Relator</td>
                                <td>Total de Processos por relator</td>
                                <td>Valor por Relator</td>
                            </tr>
                            <?php $result = ListarNomeRelator($filtro, $filtro1, $cam);
                            while ($linha = $result->fetch_assoc()) {
                                $resultV = ValorRelator($linha['relator'], $filtro, $filtro1, $cam);
                                $resultT = TotalProcessosRelator($linha['relator'], $filtro, $filtro1 , $cam); ?>
                                <tr>
                                    <td><?php echo $linha['relator']; ?> </td>
                                    <td><?php echo $resultT; ?></td>
                                    <td>R$ <?php echo number_format($resultV, 2, ',', '.'); ?> </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <td style="align:higth;">
                            <a href="../cadastroPrimeiraC.php?cam=<?php echo $_SESSION['cam']; ?>" class="btn btn-danger btn-sm"> Voltar <span class="glyphicon glyphicon glyphicon-share-alt"></span></a>
                        </td>
                </div>
            </div>
        </div>
</body>

</html>
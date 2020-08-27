<?php
session_start();
$_SESSION['cam'] = $_GET['cam'];
require_once "../Repository/login/protect.php";
require_once "../Repository/relatores/dadosRelator.php";
protect();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Processos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../lib/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../lib/select2/css/select2.css">
    <link rel="stylesheet" type="text/css" href="../lib/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../lib/css/menu.css">
    <script src="../lib/jquery-3.2.1.min.js"></script>
    <script src="../lib/alertifyjs/alertify.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <script src="../lib/select2/js/select2.js"></script>
    <script src="../js/funcoes.js"></script>
</head>
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
    <br><br><br><br>
    <div class="container">
        <h1>Processos</h1>
        <?php if ($_SESSION['cam'] == $_SESSION['camara'] || $_SESSION['camara'] == 0) { ?>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmProcessos">
                        <label>N° FA</label>
                        <input type="text" class="form-control input-sm" id="nrofa" name="nrofa">
                        <label>Consumidor</label>
                        <input type="text" class="form-control input-sm" id="consumidor" name="consumidor">
                        <label>Fornecedor</label>
                        <input type="text" class="form-control input-sm" id="fornecedor" name="fornecedor">
                        <label>Valor do 1 º Grau</label>
                        <input type=" text " class="form-control input-sm" id="ValorGrau_1" name="ValorGrau_1">
                        <label> Valor do 2º Grau</label>
                        <input type="text" class="form-control input-sm" id="ValorGrau_2" name="ValorGrau_2">
                        <label>Recurso</label>
                        <select class="form-control input-sm" id="recurso" name="recurso">
                            <option> Tempestivo </option>
                            <option> Intempestivo </option>
                        </select>
                        <label>Relatores</label>
                        <select class="form-control input-sm" id="relator" name="relator">
                            <option>-----</option>
                            <?php
                            $nomeR = listarRelator($_SESSION['cam']);
                            while ($mostrar = mysqli_fetch_row($nomeR)) : ?>
                                <option><?php echo $mostrar[0] ?></option>
                            <?php endwhile ?>
                        </select>
                        <label>Data De Julgamento</label>
                        <input type="date" class="form-control input-sm" id="data_jugamento" name="data_jugamento">
                        <label>Ano</label>
                        <input type="number" class="form-control input-sm" id="ano" name="ano">
                        <input type="hidden" value="<?php echo $_SESSION['cam'] ?>" name="camara" id="camara">
                        <p></p>
                        <!-- essa span é onde está o botão salvar. Ao ser clicado será acionado o id btnAdicionarFornecedores -->
                        <span class="btn btn-primary" id="buscar">Salvar</span>
                        <a type="button" class="btn btn-danger" href="inicio.php">Voltar</a>
                    </form>
                </div>
            <?php } ?>
            <!--div que carrega do lado direito da página e recebe os valores digitados do lado esquerdo. Note que uma tem col-sm-4 e a outra col-sm-8, o que soma 12-->
            <div class="row">
                <div class="col-sm-3">
                    <form method="POST" style="width:300px;">
                        <label>De :</label>
                        <input type="date" class="form-control" name="filtr" id="filtro1" style="width:155px;">
                        <label>Até :</label>
                        <input type="date" class="form-control" name="filtr1" id="filtro2" style="width:155px;">
                        <br>
                        <input type="submit" value="filtrar" id="busca" class="btn btn-success">
                        <?php if ($_SESSION['cam'] != $_SESSION['camara'] || $_SESSION['camara'] == 0) { ?>
                            <a type="hidden" class="btn btn-danger" href="inicio.php">Voltar</a>
                        <?php } ?>
                    </form>
                </div>
                <div class="col-sm-6">
                    <div id="table" class="container-fluid" style="width:700px;">
                    </div>
                </div>
            </div>
            </div>
    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="abremodalProcessosUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Atualizar Processo</h4>
                </div>
                <div class="modal-body">
                    <form id="frmProcessosU">
                        <input type="text" hidden="" id="idprocessoU" name="idprocessoU">
                        <label>N° FA</label>
                        <input type="number" class="form-control input-sm" id="nrofaU" name="nrofaU">
                        <label>Consumidor</label>
                        <input type="text" class="form-control input-sm" id="consumidorU" name="consumidorU">
                        <label>Fornecedor</label>
                        <input type="text" class="form-control input-sm" id="fornecedorU" name="fornecedorU">
                        <label>Valor do 1ª Grau</label>
                        <input type="text" class="form-control input-sm" id="ValorGrau_1U" name="ValorGrau_1U">
                        <label> Valor do 2º Grau</label>
                        <input type="text" class="form-control input-sm" id="ValorGrau_2U" name="ValorGrau_2U">
                        <label>Recurso</label>
                        <select class="form-control input-sm" id="recursoU" name="recursoU">
                            <option name="recursoU" id="recursoTU">Tempestivo </option>
                            <option name="recursoU" id="recursoIU"> Intempestivo </option>
                        </select>
                        <label>Relator</label>
                        <select class="form-control input-sm" id="relatorU" name="relatorU">
                        <option id="relatorU" name="relatorU">teste</option>
                            </select>
                           <br> 
                        <label>Data de julgamento</label>
                        <input type="date" class="form-control input-sm" id="data_jugamentoU" name="data_jugamentoU">
                        <label>Ano</label>
                        <input type="number" class="form-control input-sm" id="anoU" name="anoU">
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnAdicionarProcessoU" type="button" class="btn btn-primary" data-dismiss="modal">Atualizar</button>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "templates/footer.php"; ?>
</body>

</html>
<!-- Adicionar dados -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script>
    $('#ValorGrau_1').mask('000.000.000.000.000,00', {
        reverse: true
    });
    $('#valorU').mask('000.000.000.000.000,00', {
        reverse: true
    });
    $('#ValorGrau_2').mask('000.000.000.000.000,00', {
        reverse: true
    });
</script>
<script type="text/javascript">
    function adicionarDado(idprocesso) {
        $.ajax({
            type: "POST",
            data: "idprocesso=" + idprocesso,
            url: "../Repository/processos/obterDadosProcessos.php",
            success: function(r) {
                dado = jQuery.parseJSON(r);
                $('#idprocessoU').val(idprocesso);
                $('#nrofaU').val(dado['nrofa']);
                $('#consumidorU').val(dado['consumidor']);
                $('#fornecedorU').val(dado['fornecedor']);
                $('#ValorGrau_1U').val(dado['ValorGrau_1']);
                $('#ValorGrau_2U').val(dado['ValorGrau_2']);
                $('#recursoU').val(dado['recurso']);
                $('#relatorU').val(dado['relator']);
                $('#data_jugamentoU').val(dado['data_jugamento']);
                $('#anoU').val(dado['ano']);
            }
        });
    }
    // Eliminar fornecedores
    function eliminar(idprocesso) {
        alertify.confirm('Deseja Excluir este registro?', function() {
            $.ajax({
                type: "POST",
                data: "idprocesso=" + idprocesso,
                url: "../Repository/processos/eliminarProcessos.php",
                success: function(r) {
                    if (r == 1) {
                        $('#tabelaProcessosLoad').load("processos/tabelaProcessos.php");
                        alertify.success("Excluido com sucesso!!");
                    } else {
                        alertify.error("Não foi possível excluir");
                    }
                }
            });
        }, function() {
            alertify.error('Cancelado !')
        });
    }
</script>
<!-- Adicionar processos -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#buscar').click(function() {
            vazios = validarFormVazio('frmProcessos');
            if (vazios > 0) {
                alertify.alert(
                    "Preencha os Campos!"
                ); //Se todos os campos da div class container não forem preenchidos chama a função alerta "Preeencha os campos
                return false;
            }
            dados = $('#frmProcessos').serialize();
            $.ajax({
                type: "POST",
                data: dados,
                url: "../Repository/processos/adicionarProcessos.php",
                success: function(r) {
                    if (r == 1) {
                        $('#frmProcessos')[0].reset();
                        //para adicionar novo registro
                        alertify.success("Registro Adicionado");
                    } else {

                        alertify.error("Não foi possível adicionar");
                    }
                }
            });
        });
    });
    $("#busca").click(function(e) {
        e.preventDefault();
        let filtr = $("#filtro1").val();
        let filtr1 = $("#filtro2").val();
        $.post('processos/tabelaProcessos.php', {
            filtr: filtr,
            filtr1: filtr1
        }, function(data) {
            $("#table").html(data);
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btnAdicionarProcessoU').click(function() {
            dado = $('#frmProcessosU').serialize();
            $.ajax({
                type: "POST",
                data: dado,
                url: "../Repository/processos/atualizarProcessos.php",
                success: function(r) {
                    if (r != 1) {
                        $('#frmProcessos')[0].reset();
                        ('#tabelaProcessosLoad').load("processos/tabelaProcessos.php");
                        alertify.success("Registro atualizado com sucesso!");
                    } else {
                        alertify.error("Não foi possível atualizar registro");
                    }
                }
            });
        })
    })
</script>
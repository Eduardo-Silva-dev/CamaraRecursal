<?php
session_start();
require_once "../../Repository/processos/Relatorio.php";
$camara = $_SESSION['camara'];
$filtro = $_POST['filtr'];
$filtro1 = $_POST['filtr1'];
$grau1 = totalGrau1($filtro, $filtro1, $_SESSION['cam']);
$grau2 = totalGrau2($filtro, $filtro1, $_SESSION['cam']);
$totalValores = totalValores($filtro, $filtro1, $_SESSION['cam']);
$result = todosProcessos($filtro, $filtro1, $_SESSION['cam']);
require_once "../../Repository/login/protecte.php";
protect();
?>
<br>
<script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
<table class="table table-bordered" id="dataTable" cellspacing="4">
    <thead>
        <tr>
            <th>Nº FA</th>
            <th>consumidor</th>
            <th>Fornecedor</th>
            <th>Relator</th>
            <th>1º Grau</th>
            <th>2º Grau</th>
            <th>Data</th>
            <th>Ano</th>
            <th>Recurso</th>
            <?php if ($_SESSION['camara'] === $_SESSION['cam'] || $_SESSION['camara'] == 0) { ?>
            <th>Editar</th>
            <th>Excluir</th>
            <?php }?>
        </tr>
    </thead>
    <tbody>
        <?php while ($mostrar = mysqli_fetch_row($result)) : ?>
    <tbody id="myTable">
        <tr>
            <td><?php echo $mostrar[1]; ?></td>
            <td><?php echo $mostrar[2]; ?></td>
            <td><?php echo $mostrar[3]; ?></td>
            <td><?php echo $mostrar[4]; ?></td>
            <td> R$<?php echo number_format($mostrar[5], 2, ',', '.');  ?></td>
            <td>R$<?php echo number_format($mostrar[6], 2, ',', '.');  ?></td>
            <td><?php echo date("d/m/Y", strtotime($mostrar[7])) ?></td>
            <td><?php echo $mostrar[8]; ?></td>
            <td><?php echo $mostrar[9]; ?></td>
            <?php if ($_SESSION['camara'] === $mostrar[10] || $_SESSION['camara'] == 0) { ?>
                <td>
                    <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#abremodalProcessosUpdate" onclick="adicionarDado('<?php echo $mostrar[0]; ?>')">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </span>
                </td>
                <td>
                    <span class="btn btn-danger btn-xs" onclick="eliminar('<?php echo $mostrar[0]; ?>')">
                        <span class="glyphicon glyphicon-remove"></span>
                    </span>
                </td>
            <?php } ?>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<table class="table " style="text-align: center;">
    <tr>
        <th style="text-align:center;">Total 1ª Grau.</td>
    </tr>
    <tr>
        <td>
            R$ <?php echo $grau1; ?>
        </td>
    </tr>
</table>
<table class="table " style="text-align: center;">
    <tr>
        <th style="text-align:center;">Total 2ª Grau.</td>
    </tr>
    <tr>
        <td>
            R$ <?php echo $grau2; ?>
        </td>
    </tr>
    <table class="table   table-dark" style="text-align: center;">
        <tr>
            <th style="text-align:center;">Total dos Valores.</td>
        </tr>
        <tr>
            <td>
                R$ <?php echo $totalValores; ?>
            </td>
        </tr>
        </div>
    </table>
    <td style="align:center;">
        <a href="../Repository/pdf/RelatorioPdf.php?filtr=<?php echo $filtro; ?>&filtr1=<?php echo $filtro1; ?>&cam=<?php echo $_SESSION['cam']?>" class="btn btn-danger btn-sm">
            Imprimir <span class="glyphicon glyphicon-print"></span>
        </a>
    </td>
    <br>
    <br>
    </div>
    <table style="text-align: center; height: 100px ;">
        <tr>
            <td style=" text-decoration:none color:#FFF;"><a href="./relatores/tabelaRelatores1.php?filtro=<?php echo $filtro; ?>&filtro1=<?php echo $filtro1; ?>&cam=<?php echo $_SESSION['cam']?>">Total de valores por relator no mês
                    <!--target="_blank--></a></td>
        </tr>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
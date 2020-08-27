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
?>
</table> -->
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label>Total por Relator</label></caption>
    <tr>
        <td>--</td>
        <td>Total de Processos por relator</td>
        <td>Valor por Relator</td>
    </tr>
    <?php $result = ListarNomeRelator($filtro, $filtro1);
    while ($linha = $result->fetch_assoc()) {
        $resultV = ValorRelator($linha['relator'], $filtro, $filtro1);
        $resultT = TotalProcessosRelator($linha['relator'], $filtro, $filtro1); ?>
        <tr>
            <td><?php echo $linha['relator']; ?> </td>
            <td><?php echo $resultT; ?></td>
            <td>R$ <?php echo number_format($resultV, 2, ',', '.'); ?> </td>
        </tr>
    <?php } ?>
</table>
<td style="align:higth;">
    <a href="../cadastroPrimeiraC.php" class="btn btn-danger btn-sm">
        Voltar <span class="glyphicon glyphicon glyphicon-share-alt"></span>
    </a>
</td>
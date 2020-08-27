<?php
function ListarNomeRelator($filtro, $filtro1)
{
    require_once "../../conexao/conexao.php";
    $c = new conectar();
    $conexao = $c->conexao();
    $sql = "SELECT relator FROM processos where data_jugamento between '$filtro' and '$filtro1' group by relator ORDER BY relator desc; ";
    $buscarrelator = mysqli_query($conexao, $sql);
    return $buscarrelator;
}
function TotalProcessosRelator($relator, $filtro, $filtro1)
{
    require_once "../../conexao/conexao.php";
    $c = new conectar();
    $conexao = $c->conexao();
    $sql6 = "SELECT COUNT(relator) AS Qtd FROM  processos where relator = '$relator'and data_jugamento between '$filtro' and '$filtro1';";
    $buscar = mysqli_query($conexao, $sql6);
    while ($l = $buscar->fetch_assoc()) {
        break;
    }
    return $l['Qtd'];
}
function ValorRelator($relator, $filtro, $filtro1)
{
    require_once "../../conexao/conexao.php";
    $c = new conectar();
    $conexao = $c->conexao();
    $sql5 = "SELECT sum(ValorGrau_2) as ValorGrau_2 from processos where relator = '$relator'and data_jugamento between '$filtro' and '$filtro1' group by relator ORDER BY relator asc";
    $buscarrelator = mysqli_query($conexao, $sql5);
    $valor = 0;
    while ($array3 = $buscarrelator->fetch_assoc()) {
        $valor = $valor + $array3['ValorGrau_2'];
    }
    return $valor;
}
function TotalProcessos($filtro, $filtro1)
{
    require_once "../../conexao/conexao.php";
    $c = new conectar();
    $conexao = $c->conexao();
    $sql5 = "SELECT count(relator) as relator from processos where data_jugamento between '$filtro' and '$filtro1'";
    $buscarrelator = mysqli_query($conexao, $sql5);
    $valor = 0;
    while ($array3 = $buscarrelator->fetch_assoc()) {
        $valor = $valor + $array3['relator'];
    break;
    }
    return $valor;
}
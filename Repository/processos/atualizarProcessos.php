<?php
require_once "../../conexao/conexao.php";
require_once "../../controller/usuarios.php";
$c = new conectar();
$conexao = $c->conexao();

    $usu_id = intval($_POST['idprocessoU']);

    if (!isset($_SESSION))
        session_start();

    foreach ($_POST as $chave => $valor)
        $_SESSION[$chave] = mysqli_real_escape_string($conexao, $valor);

    $sql = "UPDATE processos SET
        nrofa = '$_SESSION[nrofaU]',
        consumidor = '$_SESSION[consumidorU]',
        fornecedor = '$_SESSION[fornecedorU]',
        ValorGrau_1 = '$_SESSION[ValorGrau_1U]',
        ValorGrau_2 = '$_SESSION[ValorGrau_2U]',
        recurso = '$_SESSION[recursoU]',
        relator ='$_SESSION[relatorU]',
        data_jugamento = '$_SESSION[data_jugamentoU]',
        ano = '$_SESSION[anoU]'
        WHERE id_processos = '$usu_id'";

    $confimar = $conexao->query($sql) or die($conexao->error);

    if ($confimar) {
       
    } else {
        unset($_SESSION);
        header("Location: ../../view/cadastroPrimeiraC.php");
     }
    mysqli_close($conexao);
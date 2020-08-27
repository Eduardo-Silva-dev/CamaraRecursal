<?php
session_start();
require_once "../../conexao/conexao.php";
require_once "../../controller/processos.php";
$obj = new processos();
$dados = array(
    $_POST['nrofa'],
    $_POST['consumidor'],
    $_POST['fornecedor'],
    $_POST['relator'],
    limpar($_POST['ValorGrau_1']),
    limpar($_POST['ValorGrau_2']),
    $_POST['data_jugamento'],
    $_POST['ano'],
    $_POST['recurso'],
    $_POST['camara']
);
echo $obj->adicionar($dados);
function limpar($str){
    $source = array('.',',');
    $replace = array('','.');
    $valor = str_replace($source,$replace,$str);
    return $valor;
}
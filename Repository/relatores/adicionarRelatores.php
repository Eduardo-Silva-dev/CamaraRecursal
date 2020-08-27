<?php
session_start();
require_once "../../conexao/conexao.php";
require_once "../../controller/relatores.php";
$obj = new relatores();
$dados = array(
	$_POST['nome'],
	$_POST['cpf'],
	$_POST['camara']
);
echo $obj->adicionarRelator($dados);

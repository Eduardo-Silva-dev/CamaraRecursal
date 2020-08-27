<?php
session_start();
require_once "../../conexao/conexao.php";
require_once "../../controller/usuarios.php";
$obj = new usuarios();
$dados = array(
	$_POST['usuario'],
	$_POST['senha']
);
echo $obj->login($dados);

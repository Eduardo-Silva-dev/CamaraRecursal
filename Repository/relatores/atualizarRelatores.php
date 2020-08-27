<?php
require_once "../../conexao/conexao.php";
require_once "../../controller/relatores.php";
$obj = new relatores();
$dado = array(
	$_POST['id_relator'],
	$_POST['nomeU'],
	$_POST['cpfU'],
	$_POST['camaraU']
);
echo $obj->atualizarRelator($dado);

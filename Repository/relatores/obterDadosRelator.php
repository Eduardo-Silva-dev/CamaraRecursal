<?php
require_once "../../conexao/conexao.php";
require_once "../../controller/relatores.php";
$obj = new relatores();
echo json_encode($obj->obterDadosRelator($_POST['id_relator']));
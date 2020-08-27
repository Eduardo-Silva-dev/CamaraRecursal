<?php
require_once "../../conexao/conexao.php";
require_once "../../controller/relatores.php";
$id = $_POST['id_relator'];
$obj = new relatores();
echo $obj->excluirRelator($id);

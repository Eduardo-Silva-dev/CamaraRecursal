<?php
require_once "../../conexao/conexao.php";
require_once "../../controller/processos.php";
$id = $_POST['idprocesso'];
$obj = new processos();
echo $obj->excluir($id);
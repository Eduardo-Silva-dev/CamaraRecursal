<?php
require_once "../../conexao/conexao.php";
require_once "../../controller/usuarios.php";
$obj = new usuarios;
echo $obj->excluir($_POST['idusuario']);
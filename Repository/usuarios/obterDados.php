<?php
require_once "../../conexao/conexao.php";
require_once "../../controller/usuarios.php";
$obj = new usuarios;
echo json_encode($obj->obterDados($_POST['idUsuario']));
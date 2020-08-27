<?php

	require_once "../../conexao/conexao.php";
	require_once "../../controller/usuarios.php";
	$c = new conectar();
	$conexao = $c->conexao();

        $usu_id = intval($_POST['idUsuario']);

        if (!isset($_SESSION))
            session_start();

        foreach ($_POST as $chave => $valor)
            $_SESSION[$chave] = mysqli_real_escape_string($conexao, $valor);

        $senha = sha1($_SESSION['senhaU']);

        $sql = "UPDATE usuarios SET
            nome = '$_SESSION[nomeU]',
            usuario = '$_SESSION[usuarioU]',
            email = '$_SESSION[emailU]',
            senha = '$senha',
            camara ='$_SESSION[camaraU]'
            WHERE id_usuarios = '$usu_id'";

        $confimar = $conexao->query($sql) or die($conexao->error);

        if ($confimar) {
           
        } else {
			unset($_SESSION);
            header("Location: ../../view/usuarios/usuarios.php");
		 }
        mysqli_close($conexao);
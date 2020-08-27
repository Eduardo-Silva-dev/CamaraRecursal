<?php
function validarUser()
{
    if (isset($_POST['confirmar'])) {
        $c = new conectar();
        $con = $c->conexao();
        $login =  mysqli_real_escape_string($con, $_POST['usuario']);
        $senha = sha1($_POST['senha']);
        $result = $con->query("SELECT * FROM `usuarios` WHERE `usuario` = '$login' AND `senha`= '$senha'");
        $resultado = $result->fetch_assoc();
        if (!isset($_SESSION)) {
            session_start();
        }

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['usuario'] = $login;
            $_SESSION['senha'] = sha1($senha);
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['camara'] = $resultado['camara'];
            header('location: inicio.php');
        } else {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('location:index.php');
        }
    }
}
if (isset($_GET['logout'])) {
    logout();
}
function logout()
{   
    session_start();
    session_destroy();
    header("Refresh: 0; ../../view/index.php");
}

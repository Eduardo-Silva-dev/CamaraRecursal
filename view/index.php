<?php
require_once "../conexao/conexao.php";
require_once "../Repository/login/ValidacaoUser.php";
$obj = new conectar();
$conexao = $obj->conexao();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta HTTP-EQUIV='refresh'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>SB Admin - Login</title>
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
	<div class="container" style="width: 500px;">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header"> <img src="../img/lg04.png" width="300px" height="90px" class="rounded mx-auto d-block" alt=""></div>
			<div class="card-body">
				<form method="POST" action="index.php" id="frmLogin">
					<div class="form-group">
						<label for="email">Usuario</label>
						<input type="text" class="form-control" id="usuario" autocomplete="on" placeholder="Seu Usuario" name="usuario">
					</div>
					<div class="form-group">
						<label for="psw">Senha</label>
						<input type="password" class="form-control" id="psw" placeholder="Senha" name="senha">
					</div>
					<input id="" class="btn btn-primary" type="submit" value="Entrar" name="confirmar" <?php validarUser(); ?>>
				</form>
				<!-- <span class="btn btn-primary " id="entrarSistema" <?php //validarUser();?>>Entrar</span> -->
			</div>
		</div>
	</div>
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#entrarSistema').click(function() {
				vazios = validarFormVazio('frmLogin');
				if (vazios < 0) {
					alert("Preencha os campos!!");
					return false;
				}
			});
		});
	</script>
</body>

</html>
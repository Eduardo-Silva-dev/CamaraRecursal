<?php
class usuarios
{
	public function registroUsuario($dados)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$data = date('Y-m-d');
		$sql = "INSERT into usuarios (nome, usuario, email, senha, dataCaptura, camara) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$data','$dados[4]')";
		return mysqli_query($conexao, $sql);
	}
	public function login($dados)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$senha = sha1($dados[1]);
		$_SESSION['usuario'] = $dados[0];
		$_SESSION['iduser'] = self::trazerId($dados);
		$sql = "SELECT * from usuarios where email = '$dados[0]' and senha = '$senha' ";
		$result = mysqli_query($conexao, $sql);
		if (mysqli_num_rows($result) > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	public function trazerId($dados)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$senha = sha1($dados[1]);
		$sql = "SELECT id from usuarios where email='$dados[0]' and senha = '$senha' ";
		$result = mysqli_query($conexao, $sql);
		return mysqli_fetch_row($result)[0];
	}
	public function obterDados($idusuario)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$sql = "SELECT id_usuarios,nome,usuario,email,senha,camara  from usuarios where id_usuarios='$idusuario'";
		$result = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($result);
		$dados = array(
			'id_usuarios' => $mostrar[0],
			'nome' => $mostrar[1],
			'usuario' => $mostrar[2],
			'email' => $mostrar[3],
			'senha' => $mostrar[4],
			'camara' => $mostrar[5]
		);
		return $dados;
	}
	public function atualizar($dados)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$sql = "UPDATE usuarios set nome='$dados[1]',usuario='$dados[2]',email='$dados[3]',senha='$dados[4]',camara='$dados[5]' where id_usuarios='$dados[0]'";
		return mysqli_query($conexao, $sql);
	}
	public function excluir($idusuario)
	{
		$c = new conectar();
		$conexao = $c->conexao();
		$sql = "DELETE from usuarios where id_usuarios='$idusuario'";
		return mysqli_query($conexao, $sql);
	}
}

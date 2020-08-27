<?php
class conectar
{
	private $servidor = "localhost";
	private $usuario = "root";
	private $senha = "";
	private $bd = "sistema";
	public function conexao()
	{
		$conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->bd);
		return $conexao;
	}
}
function listarRelator($cam){
    $c = new conectar();
    $conexao = $c->conexao();
    $sql = "SELECT nome FROM relatores WHERE camara = '$cam'";
    $result = mysqli_query($conexao, $sql);
    return $result;
}
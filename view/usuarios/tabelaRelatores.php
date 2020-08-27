<?php
require_once "../../conexao/conexao.php";
require_once "../../Repository/login/protecte.php";
protect();
$c = new conectar();
$conexao = $c->conexao();
$sql = "SELECT * from relatores";
$result = mysqli_query($conexao, $sql);
?>
<style>
th{
	text-align:center;
}
</style>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Relatores</label></caption>
	<tr>
		<th>Nome</th>
		<th>Cpf</th>
		<th>Câmaras</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>
	<?php while ($mostrar = mysqli_fetch_row($result)) : ?>
		<tr>
			<td><?php echo $mostrar[1]; ?></td>
			<td><?php echo $mostrar[2]; ?></td>
			<td><?php echo $mostrar[3].'°'; ?></td>
			<td>
				<span data-toggle="modal" data-target="#atualizaRelatorModal" class="btn btn-warning btn-xs" onclick="editarRelatores('<?php echo $mostrar[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminarRelatores('<?php echo $mostrar[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
		</tr>
	<?php endwhile; ?>
</table>
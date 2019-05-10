<?php 
require_once 'php/lib/bancoDeDados.php';

$oCon = new BancoDeDados();

$lista = null;

if($oCon->abrirConexao()){

	if(isset($_GET["comFuncionario"])){
		$sql = "SELECT * FROM usuario WHERE funcionario = 'Sim'";
		$oCon->executarSQL($sql);

		$lista = $oCon->lerResultados();

	}else if(isset($_GET["comCliente"])){
		$sql = "SELECT * FROM usuario WHERE funcionario = 'Nao'";
		$oCon->executarSQL($sql);

		$lista = $oCon->lerResultados();
	}
	else{
		$sql = "SELECT * FROM usuario";
		$lista = $oCon->executarSQL($sql);

		$lista = $oCon->lerResultados();
	}


}else{
	echo "Erro ao conectar ao Banco de Dados";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Listar Todos os Usuários</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Lista de Usuários Cadastrados</h1>
	<form> 
		<input type="submit" name="semFuncionario" value="Listar Todos">
		<input type="submit" name="comFuncionario" value="Apenas Funcionários">
		<input type="submit" name="comCliente" value="Apenas Clientes">
	</form>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>Nome</td>
			<td>Usuário</td>
			<td>CPF</td>
			<td>Funcionário</td>
		</tr>

		<?php 
			foreach($lista as $i){
		?>
			<tr>
				<td><?php echo $i[0] ?></td>
				<td><?php echo $i[1] ?></td>
				<td><?php echo $i[2] ?></td>
				<td><?php echo $i[3] ?></td>
				<td><?php echo $i[5] ?></td>
			</tr>
		<?php 
			}

			$oCon->fecharConexao();
			unset($_GET);
		?>
	</table>
</body>
</html>
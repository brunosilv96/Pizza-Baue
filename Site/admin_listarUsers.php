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
	<link rel="stylesheet" href="css/if_usuarios.css">
</head>
<body>
		<h3>Usuários Cadastrados</h3>
	<form> 
		<div class="botoes">
			<input type="submit" name="semFuncionario" value="Listar Todos" class="optusers">
			<input type="submit" name="comFuncionario" value="Apenas Funcionários" class="optusers">
			<input type="submit" name="comCliente" value="Apenas Clientes" class="optusers">
		</div>
	</form>
	<table class="table-users">
		<tr class="tr tr1">
			<td class="td">ID</td>
			<td class="td">Nome</td>
			<td class="td">Usuário</td>
			<td class="td">CPF</td>
			<td class="td">Funcionário</td>
		</tr>

		<?php 
			foreach($lista as $i){
		?>
			<tr class="tr">
				<td class="td"><?php echo $i[0] ?></td>
				<td class="td"><?php echo $i[1] ?></td>
				<td class="td"><?php echo $i[2] ?></td>
				<td class="td"><?php echo $i[3] ?></td>
				<td class="td"><?php echo $i[5] ?></td>
			</tr>
		<?php 
			}

			$oCon->fecharConexao();
			unset($_GET);
		?>
	</table>
	
</body>
</html>
<?php 
require_once 'php/lib/bancoDeDados.php';

$mensagem = null;

if(isset($_GET['status'])){
	$mensagem = $_GET['status'];
}

$oCon = new BancoDeDados();

if (!$oCon->abrirConexao()){
	echo "Sem conexão com o Banco de Dados <br><br>";
}

$sql = "SELECT * FROM categoria";

$oCon->executarSQL($sql);

$resultados = $oCon->lerResultados();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Ingredientes - Montagem</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/if_ingrediente.css">
</head>
<body>
	<p><?php echo $mensagem?></p>
	<form class="cad_ingrediente" method="POST" enctype="multipart/form-data" action="php/cadastraIngrediente.php">
		<h1>Cadastro de Ingredientes</h1>
		
		<label class="lb">Ingrediente</label>
		<input class="input-cadastro" type="text" name="txtNome" required>

		<label class="lb">Preço R$ (Porção)</label>
		<input class="input-cadastro" type="text" name="txtValor" required>

		<label class="lb">Imagem do Ingrediente</label>
		<input class="input-cadastro" type="file" name="imgIngrediente" required>

		<label class="lb">Categoria</label>
		<select name="boxCategoria" required>
			<option value="null">Selecione a Categoria</option>
			<?php 
			foreach ($resultados as $value) {
			?>
				<option value="<?php echo $value[1]?>"><?php echo $value[1]?></option>
			<?php
			}

			$oCon->fecharConexao();
			?>
		</select>

		<div class="botoes">
			<button class="botoes-btn" type="submit">Salvar</button>
			<button class="botoes-btn"type="reset">Limpar</button>
		</div>
	</form>
</body>
</html>
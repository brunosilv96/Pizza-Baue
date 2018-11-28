<?php
require_once 'php/lib/bancoDeDados.php';
require_once 'php/class/Endereco.php';

session_start();

$codigo = $_SESSION["id_usuario"];

$conex = new BancoDeDados();

$logradouro = null;
$numero = null;
$estado = null;
$uf = null;
$complemento = null;

if ($conex->abrirConexao()) {

    $conex->executarSQL("SELECT * FROM endereco WHERE id_usuario_fk = '$codigo'");

    $resultado = $conex->lerResultados();

    if (count($resultado) > 0) {
        $logradouro = $resultado[0][1];
        $numero = $resultado[0][2];
        $estado = $resultado[0][3];
        $uf = $resultado[0][4];
        $complemento = $resultado[0][5];
        
        $conex->fecharConexao();
    }
}

?>
<html>
<head>
<meta charset="utf-8">
<meta name="author" content="Bruno Silva">
<meta name="description" content="Pedidos do Wireframe">

<link rel="stylesheet" href="css/if_global.css">
<link rel="stylesheet" href="css/if_cadastro.css">
</head>
<body>

	<div class="conteudo">
		<h3>Alterar Endereço</h3>
		<form action="php/atualizaEndereco.php" method="post">
			<table>
				<tr>
					<td class="lb"><label>Logradouro:</label></td>
					<td class="txt"><input type="text" class="input-cadastro"
						name="txtLogradouro" value="<?php echo $logradouro;?>"></td>
				</tr>
				<tr>
					<td class="lb"><label>Número:</label></td>
					<td class="txt"><input type="text" class="input-cadastro"
						name="txtNumero" value="<?php echo $numero;?>"></td>
				</tr>
				<tr>
					<td class="lb"><label>Estado:</label></td>
					<td class="txt"><input type="text" class="input-cadastro"
						name="txtEstado" value="<?php echo $estado;?>"></td>
				</tr>
				<tr>
					<td class="lb"><label>UF:</label></td>
					<td class="txt"><input type="text" class="input-cadastro"
						name="txtUf" value="<?php echo $uf;?>"></td>
				</tr>
				<tr>
					<td class="lb"><label>Complemento:</label></td>
					<td class="txt"><input type="text" class="input-cadastro"
						name="txtComplemento" value="<?php echo $complemento;?>"></td>
				</tr>
			</table>
			<div class="botoes">
				<input type="reset" name="btnLimpar" class="btn-cadastro"
					value="Limpar"> <input type="submit" name="btnSalvar"
					class="btn-cadastro" value="Salvar">
			</div>
		</form>
	</div>
</body>
</html>

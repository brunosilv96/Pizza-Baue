<?php
require_once 'php/lib/bancoDeDados.php';

session_start();

$codigo = $_SESSION["id_usuario"];

$conex = new BancoDeDados();

$logradouro = null;
$numero = null;
$cidade = null;
$uf = null;
$complemento = null;
$flag = null;

if(isset($_GET["flag"])){
    $flag = $_GET["flag"];
}

if ($conex->abrirConexao()) {

    $conex->executarSQL("SELECT * FROM endereco WHERE id_usuario_fk = '$codigo'");

    $resultado = $conex->lerResultados();

    if (count($resultado) > 0) {
        $logradouro = $resultado[0][1];
        $numero = $resultado[0][2];
        $cidade = $resultado[0][3];
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
		<h3>Alterar Dados</h3>
		<form action="#" method="post">
			<table>
				<tr>
					<td class="lb"><label>Nome:</label></td>
					<td class="txt"><input type="text" class="input-cadastro"
						name="txtNome"></td>
				</tr>
				<tr>
					<td class="lb"><label>E-mail:</label></td>
					<td class="txt"><input type="text" class="input-cadastro"
						name="txtEmail"></td>
				</tr>
				<tr>
					<td class="lb"><label>Senha:</label></td>
					<td class="txt"><input type="password" class="input-cadastro"
						name="txtSenha1"></td>
				</tr>
				<tr>
					<td class="lb"><label>Confirmar senha:</label></td>
					<td class="txt"><input type="password" class="input-cadastro"
						name="txtSenha2"></td>
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
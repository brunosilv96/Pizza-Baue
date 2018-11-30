<?php
require_once 'php/lib/bancoDeDados.php';

session_start();

$codigo = $_SESSION["id_usuario"];

$conex = new BancoDeDados();

$nome = null;
$email = null;
$cpf = null;
$flag = null;

if(isset($_GET["flag"])){
    $flag = $_GET["flag"];
}

if ($conex->abrirConexao()) {

    $conex->executarSQL("SELECT * FROM usuario WHERE id_usuario = '$codigo'");

    $resultado = $conex->lerResultados();

    if (count($resultado) > 0) {
        $nome = $resultado[0][1];
        $email = $resultado[0][2];
        $cpf = $resultado[0][3];
        
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
		<form action="php/atualizaCadastro.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td class="lb"><label>Nome:</label></td>
					<td class="txt"><input type="text" class="input-cadastro" name="txtNome" value="<?php echo $nome;?>"></td>
				</tr>
				<tr>
					<td class="lb"><label>E-mail:</label></td>
					<td class="txt"><input type="text" class="input-cadastro" name="txtEmail" value="<?php echo $email;?>"></td>
				</tr>
				<tr>
					<td class="lb"><label>CPF:</label></td>
					<td class="txt"><input type="text" class="input-cadastro" name="txtCpf" value="<?php echo $cpf;?>"></td>
				</tr>
				<tr>
					<td class="lb"><label>Foto de Perfil:</label></td>
					<td class="txt-img"><input type="file" name="fileImagem"></td>
				</tr>
				<tr>
					<td class="lb"><label>Senha:</label></td>
					<td class="txt"><input type="password" class="input-cadastro" name="txtSenha1"></td>
				</tr>
				<tr>
					<td class="lb"><label>Confirmar senha:</label></td>
					<td class="txt"><input type="password" class="input-cadastro" name="txtSenha2"></td>
				</tr>
				<?php
					if(trim($flag) != ""){
				?>
				<tr>
					<td colspan="2"><label class="lb-msg"><p class="p sucesso"><?php echo $flag;?></p></label></td>
				</tr>
				<?php
				}
				?>
			</table>
			<div class="botoes">
				<input type="reset" name="btnLimpar" class="btn-cadastro" value="Limpar"> <input type="submit" name="btnSalvar"
				 class="btn-cadastro" value="Salvar">
			</div>

		</form>
	</div>
</body>

</html>
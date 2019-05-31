<?php
require_once 'php/lib/bancoDeDados.php';

/* Abre a sessão na página */
session_start();

/* Recebe da sessão o código que identifica o usuário */
$codigo = $_SESSION["id_usuario"];

/* Abre uma instância com o Banco de Dados */
$conex = new BancoDeDados();

/* Seta novas variáveis que irão receber valores */
$nome = null;
$email = null;
$cpf = null;
$flag = null;

/* Recebe quaisquer "flag" ou mensagens de outras páginas via GET */
if(isset($_GET["flag"])){
    $flag = $_GET["flag"];
}

if ($conex->abrirConexao()) {

	/* Faz uma busca dos dados do usuário no Banco */
    $conex->executarSQL("SELECT * FROM usuario WHERE id_usuario = '$codigo'");

    $resultado = $conex->lerResultados();

	/* Os valores são passados as váriaveis setadas anteriormente */
    if (count($resultado) > 0) {
        $nome = $resultado[0][1];
        $email = $resultado[0][2];
		$cpf = $resultado[0][3];
		
		/* 
			***Os valores setados irão fazer o preenchimento do formulário com os dados que foram pesquisados no Banco de Dados
		*/
        
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
	<link rel="stylesheet" href="css/global.css">

</head>

<body>

	<div class="container-conteudo">
		<h3>Alterar Dados</h3>
		<form action="php/atualizaCadastro.php" method="post" id="cadastro" onsubmit="return verificaCad(event)">
			<table>
				<tr>
					<td class="lb"><label>Nome:</label></td>
				</tr>

				<tr>
					<td class="txt"><input type="text" id="nome" class="input-cadastro" name="txtNome" value="<?php echo $nome;?>"></td>
				</tr>

				<tr>
					<td class="lb"><label>E-mail:</label></td>
				</tr>

				<tr>
					<td class="txt"><input type="text" id="email" class="input-cadastro" name="txtEmail" value="<?php echo $email;?>"></td>
				</tr>

				<tr>
					<td class="lb"><label>CPF:</label></td>
				</tr>

				<tr>
					<td class="txt"><input type="text" id="cpf" class="input-cadastro" name="txtCpf" value="<?php echo $cpf;?>"></td>
				</tr>


				<tr>
					<td class="lb"><label>Nova senha:</label></td>
				</tr>

				<tr>
					<td class="txt"><input type="password" id="senha1" class="input-cadastro" name="txtSenha1"></td>
				</tr>

				<tr>
					<td class="lb"><label>Confirmar senha:</label></td>
				</tr>

				<tr>
					<td class="txt"><input type="password" id="senha2" class="input-cadastro" name="txtSenha2"></td>
				</tr>
				<?php
					if(trim($flag) != ""){
				?>
				<tr>
					<td colspan="2"><label class="lb-msg">
							<p class="p sucesso">
								<?php echo $flag;?>
							</p>
						</label></td>

				</tr>
				<tr>
					<</tr> <?php } ?>
			</table>

			<input type="submit" name="btnSalvar" class="btn-cadastro" value="Salvar">


		</form>
	</div>
</body>
<script src="js/global.js"></script>

</html>
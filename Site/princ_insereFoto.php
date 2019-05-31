<?php
$flag = null;

if (isset($_GET["flag"])) {
    $flag = $_GET["flag"];
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
		<h3>Inserir imagem de perfil</h3>
		<form action="php/inserirFoto.php" method="post"
			enctype="multipart/form-data">
			<table>
				<tr>
					<td class="lb"><label>Foto de Perfil:</label></td>
				</tr>

				<tr>
				<td class="txt-img"><input type="file" name="fileImagem" onchange="fnCarrega(this)"></td>
			</tr>
				<?php
                    if (trim($flag) != "") {
                ?>
				<tr>
					<td colspan="2"><label class="lb-msg"><p class="p sucesso"><?php echo $flag;?></p></label></td>
				</tr>
				<tr>
					<td colspan="2"><label class="lb-msg"><p class="p sucesso">Aperte F5 para ver as alterções</p></label></td>
				</tr>
				<?php
                    }
                ?>
			</table>
			<div class="botoes">
				<input type="submit" name="btnSalvar" class="btn-cadastro"
					value="Inserir">
			</div>
		</form>
	</div>
</body>
<script type="text/javascript" src="js/user.js"></script>
</html>
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
		<h3>Inserir imagem de perfil</h3>
		<form action="php/inserirFoto.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td class="lb"><label>Foto de Perfil:</label></td>
					<td class="txt-img"><input type="file" name="fileImagem"></td>
				</tr>			
			</table>
			<div class="botoes">
                <input type="submit" name="btnSalvar" class="btn-cadastro" value="Inserir">
			</div>
		</form>
	</div>
</body>

</html>
<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Montagem de Ingredientes</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="montagem2.css">
</head>
<body>
<section class="montagem">
	<form>
		<div class="etapa1">
			<div class="titulo">
				<h2>Escolha a sua massa favorita</h2>
				<p>Clique nos ingrediente de acordo com o seu gosto</p>
			</div>
			<div class="massas">
				<div class="card">
					<div class="imagem">
						<label for="id_sabor1"><img src="images/ingredientes/tradicional.png"></label>
					</div>
					<div class="sabor">
						<input type="radio" name="rdoMassa1" id="id_sabor1">
						<label for="id_sabor1">Massa Tradicional</label>
					</div>
					<div class="preco">
						<p>R$ 10,00</p>
					</div>
				</div>

				<div class="card">
					<div class="imagem">
						<img src="images/ingredientes/tradicional.png">
					</div>
					<div class="sabor">
						<input type="radio" name="rdoMassa1" id="id_sabor2">
						<label for="id_sabor2">Massa Integral</label>
					</div>
					<div class="preco">
						<p>R$ 10,00</p>
					</div>
				</div>

				<div class="card">
					<div class="imagem">
						<img src="images/ingredientes/tradicional.png">
					</div>
					<div class="sabor">
						<input type="radio" name="rdoMassa1" id="id_sabor3">
						<label for="id_sabor3">Massa Pan</label>
					</div>
					<div class="preco">
						<p>R$ 10,00</p>
					</div>
				</div>
			</div>
			
			<div class="titulo">
				<h2>Escolha o seu molho favorito</h2>
				<p>Clique nos ingrediente de acordo com o seu gosto</p>
			</div>
			<div class="molhos">
				<div class="card">
					<div class="imagem">
						<img src="images/ingredientes/tradicional.png">
					</div>
					<div class="sabor">
						<input type="radio" name="rdoMassa1" id="id_molho1">
						<label for="id_molho1">Sem Molho</label>
					</div>
					<div class="preco">
						<p>R$ 10,00</p>
					</div>
				</div>

				<div class="card">
					<div class="imagem">
						<img src="images/ingredientes/tomate.png">
					</div>
					<div class="sabor">
						<input type="radio" name="rdoMassa1" id="id_molho2">
						<label for="id_molho2">Tomate</label>
					</div>
					<div class="preco">
						<p>R$ 10,00</p>
					</div>
				</div>

				<div class="card">
					<div class="imagem">
						<img src="images/ingredientes/pesto.png">
					</div>
					<div class="sabor">
						<input type="radio" name="rdoMassa1" id="id_molho3">
						<label for="id_molho3">Pesto</label>
					</div>
					<div class="preco">
						<p>R$ 10,00</p>
					</div>
				</div>
			</div>
			
			<div class="botoes">
				<button>Anterior</button>
				<button>Próximo</button>
			</div>
		</div>
		<div class="etapa2">
			
		</div>
		<div class="etapa3">
			
		</div>
		<div class="etapa4">
			
		</div>

		<!--Visão da Tela Inicial da Montagem do Sabor-->
	    <button id="btn1" class="botao" onclick="visualizaDiv(1)">Monte sua pizza</button>
	    <p>Começe a montar o seu sabor de acordo com o seu gosto</p>
	    <p>Clique no botão!</p>
    </form>
</section>

<section class="axiliar">
	<p>Pão</p>
</session>
</body>
</html>
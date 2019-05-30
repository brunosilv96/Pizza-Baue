<?php 
require_once 'php/lib/bancoDeDados.php';

$oCon = new BancoDeDados();

if(!$oCon->abrirConexao()){
	echo "Sem conexão com Banco de Dados";
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/montagem.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<section class="montagem">
	<form name="frmMontagem">
		<!--Inicio da Primeira Etapa da Montagem-->
		<div id="etapa1"class="etapa1 global-etapas">
			<div class="titulo">
				<h2>Escolha a sua massa favorita</h2>
				<p>Clique nos ingrediente de acordo com o seu gosto</p>
			</div>
			<?php 
				$sql = "SELECT igdnome, igdvalor, igdimagem FROM ingrediente WHERE igdcategoria = 1";
				$oCon->executarSQL($sql);
				$etapa1 = $oCon->lerResultados();

				foreach ($etapa1 as $lista) {
			?>
			<div class="card fadeIn">
				<div class="imagem">
					<label for="<?php echo $lista['igdnome']?>"><img src="images/ingredientes/<?php echo $lista['igdimagem']?>"></label>
				</div>
				<div class="sabor">
					<input type="radio" name="massa" id="<?php echo $lista['igdnome']?>" value="<?php echo $lista['igdnome']?>">
					<label for="<?php echo $lista['igdnome']?>"><?php echo $lista['igdnome']?></label>
				</div>
				<div class="preco">
					<p name="valorMassa" class="price">R$ <?php echo $lista['igdvalor']?></p>
				</div>
			</div>
			<?php 
				}
			?>
			<div class="botoes">
				<button type="button" id="btn1" class="botao" onclick="visualizaDiv(0)">Inicio</i></button>
				<button type="button" id="btn1" class="botao" onclick="validaRadio(2), calcula()">Próximo<i class="fas fa-arrow-right"></i></button>
			</div>
		</div>

		<div id="etapa2" class="etapa2 global-etapas">
			<div class="titulo">
				<h2>Escolha a sua molho favorito</h2>
				<p>Clique nos ingrediente de acordo com o seu gosto</p>
			</div>
			<?php 
				$sql = "SELECT igdnome, format(igdvalor, 2)igdvalor, igdimagem FROM ingrediente WHERE igdcategoria = 2";
				$oCon->executarSQL($sql);
				$etapa2 = $oCon->lerResultados();

				foreach ($etapa2 as $lista) {
			?>
			<div class="card fadeIn">
				<div class="imagem">
					<label for="<?php echo $lista['igdnome']?>"><img src="images/ingredientes/<?php echo $lista['igdimagem']?>"></label>
				</div>
				<div class="sabor">
					<input type="radio" name="molhos" id="<?php echo $lista['igdnome']?>" value="<?php echo $lista['igdnome']?>">
					<label for="<?php echo $lista['igdnome']?>"><?php echo $lista['igdnome']?></label>
				</div>
				<div class="preco">
					<p name="valorMolho" class="price">R$ <?php echo $lista['igdvalor']?></p>
				</div>
			</div>
			<?php 
				}
			?>
			<div class="botoes">
				<button type="button" id="btn1" class="botao" onclick="visualizaDiv(1)">Voltar</button>
				<button type="button" id="btn1" class="botao" onclick="validaRadio2(3)">Próximo</button>
			</div>
		</div>

		<!--Inicio da Segunda Etapa da Montagem-->
			<div id="etapa3" class="etapa3 global-etapas">
				<div class="titulo2">
					<h2>Escolha seus ingredientes favoritos</h2>
					<p>Clique nos ingredientes de acordo com o seu gosto</p>
				</div>
				<div class="ingredientes">
					<?php 
						$sql = "SELECT igdnome, format(igdvalor, 2) igdvalor, igdimagem FROM ingrediente WHERE igdcategoria = 3 OR igdcategoria = 4";
						$oCon->executarSQL($sql);
						$etapa2 = $oCon->lerResultados();

						foreach ($etapa2 as $lista) {
					?>
					<div class="card2 fadeIn">
						<div class="imagem2 opcao2">
						<label for="<?php echo $lista['igdnome']?>"><img src="images/ingredientes/<?php echo $lista['igdimagem']?>">
							</div>
							<div class="sabor2">
								<input type="checkbox" name="ingre" id="<?php echo $lista['igdnome']?>" onclick="fnIngredientes(this)" value="<?php echo $lista['igdnome']?>">
								<label for="<?php echo $lista['igdnome']?>"><span><?php echo $lista['igdnome']?></span></label>
							</div>
							<div class="preco2">
								<p name="valorIngre" class="price">R$ <?php echo $lista['igdvalor']?></p>
							</div>
					</div>
					<?php 
						}
					?>
				</div>

				<div class="botoes">
					<button type="button" id="btn1" class="botao" onclick="visualizaDiv(2)">Voltar</button>
					<button type="button" id="btn2" class="botao" onclick="validaCheck(4)">Próximo</button>
				</div>
			</div>

			<!--Inicio da Terceira Etapa da Montagem-->
		<div id="etapa4" class="etapa4 global-etapas">
			<div class="titulo2">
					<h2>Escolha os seus complementos favoritos</h2>
					<p>Clique nos ingrediente de acordo com o seu gosto</p>
				</div>
				<div class="ingredientes">
					<?php 
						$sql = "SELECT igdnome, format(igdvalor, 2) igdvalor, igdimagem FROM ingrediente WHERE igdcategoria = 5";
						$oCon->executarSQL($sql);
						$etapa3 = $oCon->lerResultados();

						foreach ($etapa3 as $lista) {
					?>
					<div class="card2 fadeIn">
						<div class="imagem2">
						<label for="<?php echo $lista['igdnome']?>"><img src="images/ingredientes/<?php echo $lista['igdimagem']?>">
							</div>
							<div class="sabor2">
								<input type="checkbox" name="comple" id="<?php echo $lista['igdnome']?>" onclick="fnComplementos(this)" value="<?php echo $lista['igdnome']?>">
								<label for="<?php echo $lista['igdnome']?>"><?php echo $lista['igdnome']?></label>
							</div>
							<div class="preco2">
								<p class="price">R$ <?php echo $lista['igdvalor']?></p>
							</div>
					</div>
					<?php 
						}
					?>
				</div>

				<div class="botoes">
					<button type="button" id="btn1" class="botao" onclick="visualizaDiv(3)">Voltar</button>
					<button type="button" id="btn3" class="botao" onclick="validaCheck2(5)">Próximo</button>
				</div>
		</div>

		<!--Inicio da Quarta Etapa da Montagem-->
		<div id="etapa5" class="etapa5 global-etapas">
			<div class="titulo2">
					<h2>Escolha a sua finalização</h2>
					<p>Clique nos ingrediente de acordo com o seu gosto</p>
				</div>
				<div class="ingredientes">
					<?php 
						$sql = "SELECT igdnome, format(igdvalor, 2)igdvalor , igdimagem FROM ingrediente WHERE igdcategoria = 6";
						$oCon->executarSQL($sql);
						$etapa4 = $oCon->lerResultados();

						foreach ($etapa4 as $lista) {
					?>
					<div class="card2 fadeIn">
						<div class="imagem2">
						<label for="<?php echo $lista['igdnome']?>"><img src="images/ingredientes/<?php echo $lista['igdimagem']?>">
							</div>
							<div class="sabor2">
								<input type="checkbox" name="final" id="<?php echo $lista['igdnome']?>" onclick="fnFinal(this)" value="<?php echo $lista['igdnome']?>">
								<label for="<?php echo $lista['igdnome']?>"><?php echo $lista['igdnome']?></label>
							</div>
							<div class="preco2">
								<p class="price">R$ <?php echo $lista['igdvalor']?></p>
							</div>
					</div>
					<?php 
						}
					?>
				</div>

				<div class="botoes">
					<button type="button" id="btn4" class="botao" onclick="visualizaDiv(4)">Voltar</button>
					<button type="button" class="botao" onclick="validaCheck3(1)">Finalizar</button>
				</div>
		</div>

		<!--Visão da Tela Inicial da Montagem do Sabor-->
		<div id="inicial" class="etapa0 global-etapas" onload="exibeInicio()">
		<div class="logo">
			<a href="index.php"><img src="./images/logo4.png"></a>
			</div>
			<div class="introducao">
		
				<div class="intro_titulo">
					<h1>Começe a montar a sua própria pizza!</p></h1>
				</div>
				<div class="intro_conteudo">
					<p>Bem vindo ao painel inicial da montagem do seu próprio sabor de pizza, navegue entre os ingredientes selecionando os que mais se ajustam ao seu paladar, no final de tudo se delicie com a própria criação</p>
					<p>Bom Apetite!</p>
				</div>
			</div>
			<div class="intro_botao">
				<button type="button" id="btn1" class="btn_intro" onclick="visualizaDiv(1)">Monte sua pizza</button>
			</div>
	    </div>
	    <div class="etapafim">
	    	<!--Etapa final - Exibe todas as escolhas do usuário-->
	    </div>
    </form>
</section>

<!--Menu lateral na área lateral da página de montagem-->
<section class="auxiliar">
	<div class="construcao">
		<h3>Veja suas escolhas:</h3>
					<br><span class="view-mensagem"></span>
	</div>
	<div class="totalizador">
		<h3>Total a pagar:</h3>
		<label id="resultado"></label>
	</div>
</section>
</div>
   
</body>
<script>

</script>
<script src="js/montagem.js"></script>

</html>
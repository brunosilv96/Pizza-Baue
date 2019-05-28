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
	<title>Monte sua pizza!</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="./images/favicon2.png" />
	<link rel="stylesheet" type="text/css" href="css/montagem.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
	animation: spin 2s linear infinite;
	background-color:#F27620; /* cor do background que vai ocupar o body */
		z-index:999;	
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>
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
					<input type="radio" name="massa" id="<?php echo $lista['igdnome']?>">
					<label for="<?php echo $lista['igdnome']?>"><?php echo $lista['igdnome']?></label>
				</div>
				<div class="preco">
					<p class="price">R$ <?php echo $lista['igdvalor']?></p>
				</div>
			</div>
			<?php 
				}
			?>
			<div class="botoes">
				<button type="button" id="btn1" class="botao" onclick="visualizaDiv(0)">Inicio</i></button>
				<button type="button" id="btn1" class="botao" onclick="validaRadio(2)">Próximo<i class="fas fa-arrow-right"></i></button>
			</div>
		</div>

		<div id="etapa2" class="etapa2 global-etapas">
			<div class="titulo">
				<h2>Escolha a sua molho favorito</h2>
				<p>Clique nos ingrediente de acordo com o seu gosto</p>
			</div>
			<?php 
				$sql = "SELECT igdnome, igdvalor, igdimagem FROM ingrediente WHERE igdcategoria = 2";
				$oCon->executarSQL($sql);
				$etapa2 = $oCon->lerResultados();

				foreach ($etapa2 as $lista) {
			?>
			<div class="card fadeIn">
				<div class="imagem">
					<label for="<?php echo $lista['igdnome']?>"><img src="images/ingredientes/<?php echo $lista['igdimagem']?>"></label>
				</div>
				<div class="sabor">
					<input type="radio" name="molhos" id="<?php echo $lista['igdnome']?>">
					<label for="<?php echo $lista['igdnome']?>"><?php echo $lista['igdnome']?></label>
				</div>
				<div class="preco">
					<p class="price">R$ <?php echo $lista['igdvalor']?></p>
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
						$sql = "SELECT igdnome, igdvalor, igdimagem FROM ingrediente WHERE igdcategoria = 3 OR igdcategoria = 4";
						$oCon->executarSQL($sql);
						$etapa2 = $oCon->lerResultados();

						foreach ($etapa2 as $lista) {
					?>
					<div class="card2 fadeIn">
						<div class="imagem2">
						<label for="<?php echo $lista['igdnome']?>"><img src="images/ingredientes/<?php echo $lista['igdimagem']?>">
							</div>
							<div class="sabor2">
								<input type="checkbox" name="ingre" id="<?php echo $lista['igdnome']?>" onclick="fnIngredientes(this)">
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
					<button type="button" id="btn1" class="botao" onclick="visualizaDiv(2)">Voltar</button>
					<button type="button" id="btn2" class="botao" onclick="visualizaDiv(4)">Próximo</button>
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
						$sql = "SELECT igdnome, igdvalor, igdimagem FROM ingrediente WHERE igdcategoria = 5";
						$oCon->executarSQL($sql);
						$etapa3 = $oCon->lerResultados();

						foreach ($etapa3 as $lista) {
					?>
					<div class="card2 fadeIn">
						<div class="imagem2">
						<label for="<?php echo $lista['igdnome']?>"><img src="images/ingredientes/<?php echo $lista['igdimagem']?>">
							</div>
							<div class="sabor2">
								<input type="checkbox" name="ingre" id="<?php echo $lista['igdnome']?>" onclick="fnIngredientes(this)">
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
					<button type="button" id="btn3" class="botao" onclick="visualizaDiv(5)">Próximo</button>
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
						$sql = "SELECT igdnome, igdvalor, igdimagem FROM ingrediente WHERE igdcategoria = 6";
						$oCon->executarSQL($sql);
						$etapa4 = $oCon->lerResultados();

						foreach ($etapa4 as $lista) {
					?>
					<div class="card2 fadeIn">
						<div class="imagem2">
						<label for="<?php echo $lista['igdnome']?>"><img src="images/ingredientes/<?php echo $lista['igdimagem']?>">
							</div>
							<div class="sabor2">
								<input type="checkbox" name="ingre" id="<?php echo $lista['igdnome']?>" onclick="fnIngredientes(this)">
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
					<button type="button" class="botao">Finalizar</button>
				</div>
		</div>

		<!--Visão da Tela Inicial da Montagem do Sabor-->
		<div class="etapa0 global-etapas">
		<div class="logo">
			<a href="index.php"><img src="./images/logo4.png"></a>
			</div>
			<div class="introducao">
		
				<div class="intro_titulo">
					<h1>Começe a montar a sua própria pizza!</p></h1>
		    		<p>Clique no botão!</p>
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
	</div>
	<div class="totalizador">
		<h3>Total a pagar:</h3>
	</div>
</section>
</div>
   
</body>
<script>

</script>
<script src="js/montagem.js"></script>

</html>
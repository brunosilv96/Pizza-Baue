<?php 
require_once 'php/lib/bancoDeDados.php';

session_start();

$label = "Login";
$link = "#modal-login";

if(isset($_SESSION["id_usuario"])){
	$link = "principal.php";

	$conex = new BancoDeDados();

	$codigo = $_SESSION["id_usuario"];

	if($conex->abrirConexao()){
		$conex->executarSql("SELECT nome FROM usuario WHERE id_usuario = '$codigo'");
		
		$resultado = $conex->lerResultados();
		
		$label = $resultado[0][0];
		
		$conex->fecharConexao();
	}else{
		echo "Erro de conexão com o Banco de Dados";
	}
}

?>

<html>
<head>
<meta charset="utf-8">
<title>Monte sua Pizza - Baue</title>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Nunito"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
	integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
	crossorigin="anonymous">
<link rel="stylesheet" href="css/montepizza.css">
<link rel="stylesheet" href="css/global.css">


</head>
<body>
	<div class="modal closed" id="modal-login">

		<!--- Formulário de Login de Usuário -->
		<div class="modal-content ">
			<div class="modal-close">
				<a href="#" onclick="fnModalClose()"><i
					class="fas fa-times-circle"></i></a>
			</div>
			<div class="modal-body">
				<div class="tabs-select">
					<a href="#" id="login-form" class="tab tab-selected"
						onclick="fnTabs(this)">Login</a> <a href="#" id="register-form"
						class="tab" onclick="fnTabs(this)">Cadastrar</a>
				</div>
				<div class="login-form tab-active tabs-page" id="login-form-tab">

					<form action="javascript:void(0); php/Cadastro.php" method="get"
						class="form-control">
						<div class="input-group">
							<span class="fas fa-user"></span> <input type="text"
								placeholder="Username">
						</div>
						<div class="input-group">
							<span class="fas fa-lock"></span> <input type="password"
								placeholder="Senha">
						</div>
						<div class="input-group align-center">
							<button type="submit" class="btn btn-submit">Entrar</button>
						</div>
						<hr>
						<div class="lost-password align-center">
							<a href="#" class="tab" id="lost-form" onclick="fnTabs(this)">Esqueceu
								sua senha?</a>
						</div>
					</form>
				</div>

				<!--- Formulário de Cadastro de Usuário -->
				<div class="register-form tabs-page" id="register-form-tab">
					<form action="javascript:void(0);" method="get"
						class="form-control">
						<div class="input-group">
							<span class="fas fa-user"></span> <input type="text"
								placeholder="Username">
						</div>

						<div class="input-group">
							<span class="fas fa-user"></span> <input type="text"
								placeholder="E-mail">
						</div>
						<div class="input-group">
							<span class="fas fa-user"></span> <input type="text"
								placeholder="CPF" id="cpf">
						</div>



						<div class="input-group">
							<span class="fas fa-lock ga"></span> <input type="password"
								placeholder="Senha" id="senha">
						</div>
						<div class="input-group">
							<span class="fas fa-lock"></span> <input type="password"
								placeholder="Confirmar Senha " id="confirmasenha">
						</div>




						<div class="input-group align-center">
							<button type="submit" class="btn btn-submit" id="envia"
								onclick="mostrar()">Cadastrar</button>
						</div>
						<div class="campo-cpf">
							<span class="viewCPF"></span><br>
							<span class="aradio"></span><br> <span class="viewSenha"></span>
						</div>
					</form>
				</div>
				<div class="lost-form tabs-page" id="lost-form-tab">
					<div class="form-header">
						<h2 class="align-center">RECUPERAR SENHA</h2>
					</div>
					<form action="javascript:void(0);" method="get"
						class="form-control">
						<div class="input-group">
							<span class="fas fa-user"></span> <input type="text"
								placeholder="Username">
						</div>
						<div class="input-group align-center">
							<button type="submit" class="btn btn-submit">Recuperar</button>
						</div>
						<div class="input-group align-center">
							<button type="button" class="btn btn-back" onclick="fnBack()">Voltar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- END:MODALS -->

	<header>
		<div class="container-bt">
			<h4>PIZZA BAUE</h4>
		</div>
		<input type="checkbox" id="bt-menu"> <label for="bt-menu">&#9776;</label>


		<nav class="navbar">
			<ul>
				<div class="container-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="cardapio.php">Cardápio</a></li>
					<li><a href="montepizza.php">Monte sua pizza</a></li>
				
					
				</div>
				<div class="logo">
					<a href="index.php" class="logo"><img src="./images/logo4.png">
					</a>
				</div>
			</ul>

			<ul class="ul2">
				<div class="container-nav2">
						<li><a href="sobre.php">Sobre</a></li>
					<li><a href="#contato">Contato</a></li>
					<li><a href="<?php echo $link;?>" class="btn-login"
						onclick="fnModal(this)"><?php echo $label;?></a></li>
					<div class="line"></div>
				</div>
			</ul>

			</div>
		</nav>
		<div class="jumbotron">
			<h1 class="jumbotron-heading">O QUE VOCÊ QUER CUSTOMIZAR?</h1>
		</div>

		<section>

			<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
				version="1.1"
				style="shape-rendering: geometricPrecision; text-rendering: geometricPrecision; image-rendering: optimizeQuality; fill-rule: evenodd; clip-rule: evenodd"
				viewBox="0 0 11007 2540" xmlns:xlink="http://www.w3.org/1999/xlink">
 
 <g id="Camada_x0020_1">
  <metadata id="CorelCorpID_0Corel-Layer" />
  <path class="fil0 str0"
					d="M2 1510c2170,-960 3678,-329 4453,-102 517,158 982,281 1412,376 61,14 122,26 181,39 1599,328 2642,142 4104,-290 298,-88 594,-177 889,-275l2 1284 -11043 0 0 -1030z" />
 </g>
</svg>

		</section>
	</header>
	<main>
	<section class="montepizza">
		<section class="container">
			<div class="title-igredientes">
				<h1>MASSA</h1>
				<h3>Escolha uma opção</h3>
			</div>
			<section class="igredientes">
					<div class="container-image ">
						<img src="./ingredientes/tradicional.png" class="imagem-monte">
						<h4>Tradicional</h4>
					</div>
				
					<div class="container-image">
						<img src="./ingredientes/integral.png" class="left imagem-monte">
						<h4>Integral</h4>
					</div>
					
				
			</section>
			<div class="title-igredientes">
				<h1>TAMANHO</h1>
				<h3>Escolha o tamanho</h3>
			</div>
			<section class="igredientes">

				<div class="container-image">
					<img src="./ingredientes/maior.png" class="imagem-monte">
					<h4>40CM</h4>
				</div>
				<div class="container-image">
					<picture>
					<div class="imagem-img">
						<img src="./ingredientes/media.png" class="imagem-monte">
					</div>
					<h4>25CM</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/pequena.png" class="imagem-monte">
					<h4>20CM</h4>
				</div>
			</section>

			<div class="title-igredientes">
				<h1>MOLHO</h1>
				<h3>Escolha seu molho</h3>
			</div>
			<section class="igredientes">

				<div class="container-image">
					<img src="./ingredientes/tomate.png" class="imagem-monte">
					<h4>TOMATE</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/tomate-e-pimenta.png" class="imagem-monte">
					<h4>TOMATE E PIMENTA</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/pesto.png" class="imagem-monte">
					<h4>PESTO</h4>
				</div>
			</section>
			<div class="title-igredientes">
				<h1>QUEIJOS</h1>
				<h3>Escolha 1 queijo</h3>
			</div>
			<section class="igredientes">

				<div class="container-image">
					<img src="./ingredientes/parmesao.png" class="imagem-monte">
					<h4>PARMESÃO</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/mussarela.png" class="imagem-monte">
					<h4>MUSSARELA</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/gorgonzola.png" class="imagem-monte">
					<h4>GORGONZOLA</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/catypiry.png" class="imagem-monte">
					<h4>CATUPIRY</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/mussarela-de-bufala.png"
						class="imagem-monte">
					<h4>MUSSARELA DE BÚFALA</h4>
				</div>
			</section>
			<div class="title-igredientes">
				<h1>CARNES</h1>
				<h3>Escoha 1 carne</h3>
			</div>
			<section class="igredientes">

				<div class="container-image">
					<img src="./ingredientes/peito-de-peru.png" class="imagem-monte">
					<h4>PEITO DE PERU</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/lombo.png" class="imagem-monte">
					<h4>LOMBO</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/bacon.png" class="imagem-monte">
					<h4>BACON</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/calabresa.png" class="imagem-monte">
					<h4>CALABRESA</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/pepperoni.png" class="imagem-monte">
					<h4>PEPPERONI</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/presunto.png" class="imagem-monte">
					<h4>PRESUNTO</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/atum.png" class="imagem-monte">
					<h4>ATUM</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/frango.png" class="imagem-monte">
					<h4>FRANGO</h4>
				</div>
			</section>
			<div class="title-igredientes">
				<h1>COMPLEMENTOS</h1>
				<h3>Uma seleção premium de complementos</h3>
			</div>
			<section class="igredientes">

				<div class="container-image">
					<img src="./ingredientes/tomate-em-cubos.png" class="imagem-monte">
					<h4>TOMATE EM CUBOS</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/tomate-cereja.png" class="imagem-monte">
					<h4>TOMATE CEREJA</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/azeitona-preta.png" class="imagem-monte">
					<h4>AZEITONA PRETA</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/abacaxi.png" class="imagem-monte">
					<h4>ABACAXI</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/milho.png" class="imagem-monte">
					<h4>MILHO</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/ovo.png" class="imagem-monte">
					<h4>OVOS</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/champingnon.png" class="imagem-monte">
					<h4>CHAMPIGNON</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/pimentao.png" class="imagem-monte">
					<h4>PIMENTÃO</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/palmito.png" class="imagem-monte">
					<h4>PALMITO</h4>
				</div>
			</section>
			<div class="title-igredientes">
				<h1>FINALIZAÇÃO</h1>
				<h3>Dê o seu toque, com os nossos temperos</h3>
			</div>
			<section class="igredientes">

				<div class="container-image">
					<img src="./ingredientes/oregano.png" class="imagem-monte">
					<h4>ORÉGANO</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/pimenta-calabresa.png"
						class="imagem-monte">
					<h4>PIMENTA CALABRESA</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/manjericao.png" class="imagem-monte">
					<h4>MANJERICÃO</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/azeite-de-oliva.png" class="imagem-monte">
					<h4>AZEITE DE OLIVA</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/alho-torrado.png" class="imagem-monte">
					<h4>ALHO TORRADO</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/rucula.png" class="imagem-monte">
					<h4>RÚCULA</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/escarola.png" class="imagem-monte">
					<h4>ESCAROLA</h4>
				</div>
				<div class="container-image">
					<img src="./ingredientes/tomate-seco.png" class="imagem-monte">
					<h4>TOMATE SECO</h4>
				</div>

			</section>
		</section>
	</section>
	<section class="container">
		<h1 class="text-align">Ou escolha uma de nossas pizzas clássicas</h1>
		<div class="card">
			<img src="./images/pizza.png" alt="" class="image">
			<h2>Pizza Mussarela</h2>
			<p>Coberta com molho de tomate, queijo tipo mussarela, azeitonas
				pretas e orégano e massa com fermentação natural.</p>
			<div class="price-card-slider">
				<h3>R$ 22,00</h3>
			</div>
			<button class="btn-slider">Adicionar ao carrinho</button>
		</div>
		<div class="card">
			<img src="./images/baue.png" alt="" class="image">
			<h2>Pizza Baue</h2>
			<p>Pepperoni, cebola, pimentão, champignon, incrível seleção de
				carnes (bovinas e suínas) e mussarela.</p>
			<div class="price-card-slider">
				<h3>R$ 40,00</h3>
			</div>
			<button class="btn-slider">Adicionar ao carrinho</button>
		</div>
		<div class="card">
			<img src="./images/calabresa.png" alt="" class="image">
			<h2>Calabresa</h2>
			<p>Deliciosas fatias de calabresa, acompanhadas de cebola,
				azeitonas verdes e mussarela especial Pizza Baue.</p>
			<div class="price-card-slider">
				<h3>R$ 23,00</h3>
			</div>
			<button class="btn-slider">Adicionar ao carrinho</button>
		</div>
		<a href="cardapio.html">
			<button class="button-monte">Ver mais</button>
		</a>
	</section>
	</main>
	<a name="contato"></a>
	<footer>
			<div class="cont-footer">
				<div class="bloco">
					<p class="titulo">TELEFONES DE CONTATO</p>
					<p class="bl-conteudo">
						<i class="fas fa-phone ga"></i> +55(11)94631-0146 <i
							class="fas fa-phone ga"></i> +55(11)95275-0119 <i
							class="fas fa-phone ga"></i> +55(11)94893-2802 <i
							class="fas fa-phone ga"></i> +55(11)95876-6887 <i
							class="fas fa-phone ga"></i> +55(11)94539-8380
					</p>
				</div>
				<div class="bloco">
					<p class="titulo">EM CASO DE DÚVIDAS</p>
					<p class="bl-conteudo">Caso precise tirar dúvidas, entre em
						contato conosco através de nosso e-mail: pizzabaue@gmail.com</p>
				</div>
				<div class="bloco">
					<p class="titulo">REDES SOCIAIS</p>
					<p class="bl-conteudo">
						<i class="fab fa-facebook-square gab" alt="Facebook"
							title="Facebook"></i> <i class="fab fa-instagram gab"
							alt="Instagram" title="Instagram"></i> <i
							class="fab fa-twitter gab" alt="Twitter" title="Twitter"></i> <i
							class="fas fa-envelope gab" alt="E-mail" title="E-mail"></i>
					</p>
				</div>
				<div class="ft-logo">
					<p class="titulo">PIZZA BAUE</p>
					<p class="bl-conteudo">
						<img src="./images/logo4.png">
					</p>
				</div>
			</div>
			<div class="copyright">
				<p>© Copyright 2018 - Pizza Baue- Desenvolvido por alunos 2°JC -
					Informática para internet.</p>
			</div>
		</footer>
</body>
<script src="js/global.js"></script>
</html>


<?php
require_once 'php/lib/bancoDeDados.php';

session_start();

$label = "Login";
$link = "#modal-login";
$flag = null;

if (isset($_GET["flag"])) {
    $flag = $_GET["flag"];
}

if (isset($_SESSION["id_usuario"])) {
    $link = "principal.php";

    $conex = new BancoDeDados();

    $codigo = $_SESSION["id_usuario"];

    if ($conex->abrirConexao()) {
        $conex->executarSQL("SELECT nome FROM usuario WHERE id_usuario = '$codigo'");

        $resultado = $conex->lerResultados();

        $label = $resultado[0][0];

        $conex->fecharConexao();
    } else {
        echo "Erro de conexão com o Banco de Dados";
    }
}

?>

<html>

<head>
<title>Pizza Baue</title>
<meta charset="utf-8">
<link rel="shortcut icon" href="./images/favicon2.png" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
<link href="/fonts/nunito/css/nunito.all.css" rel="stylesheet">
<link href="fonts/fontawesome/css/fontawesome.min.css" rel="stylesheet">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
	integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
	crossorigin="anonymous">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/global.css">
</head>

<body>
	<div class="modal closed" id="modal-login">

		<!--- Formulário de Login de Usuário -->
		<div class="modal-content ">
			<div class="modal-close">
				<a href="#" onclick="fnModalClose()"><i class="fas fa-times-circle"></i></a>
			</div>
			<div class="modal-body">
				<div class="tabs-select">
					<a href="#" id="login-form" class="tab tab-selected"
						onclick="fnTabs(this)">Login</a> <a href="#" id="register-form"
						class="tab" onclick="fnTabs(this)">Cadastrar</a>
				</div>
				<div class="login-form tab-active tabs-page" id="login-form-tab">
					<div class="user-profile">
						<img src="./images/avatar.png">
					</div>
					<form action="php/login.php" method="post" class="form-control">
						<div class="input-group">
							<span class="fas fa-user"></span> <input type="text"
								placeholder="Email" name="txtUser">
						</div>
						<div class="input-group">
							<span class="fas fa-lock"></span> <input type="password"
								placeholder="Senha" name="txtSenha">
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
					<form method="POST" action="./php/cadastro.php"
						class="form-control" id="frmcadastro"
						onsubmit="return verificaForm(event)">
						<div class="input-group">
							<span class="fas fa-user"></span> <input type="text"
								name="txtNome" id="txtNome" placeholder="Nome"
								class="form_input">
						</div>

						<div class="input-group">
							<span class="fas fa-user"></span> <input type="text"
								name="txtEmail" id="txtEmail" placeholder="E-mail"
								class="form_input">
						</div>
						<div class="input-group">
							<span class="fas fa-user"></span> <input type="text"
								name="txtCpf" placeholder="cpf" id="cpf" maxlength="14"
								class="form_input" onkeydown="javascript: fMasc( this, mCPF );">
						</div>

						<div class="input-group">
							<span class="fas fa-lock ga"></span> <input type="password"
								name="senha1" placeholder="Senha" id="senha" class="form_input">
						</div>
						<div class="input-group">
							<span class="fas fa-lock"></span> <input type="password"
								name="senha2" placeholder="Confirmar Senha" id="confirmasenha"
								class="form_input">
						</div>
						<div class="input-group align-center">
							<button type="submit" name="btnEnvia" class="btn btn-submit"
								id="btnEnvia">Cadastrar</button>
						</div>

						<div class="campo-cpf">
							<span class="viewCPF"></span><br> <span class="aradio"></span><br>
							<span class="viewSenha"></span>
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
					<a href="index.php" class="logo"><img src="./images/logo4.png"></a>
				</div>
			</ul>

			<ul class="ul2">
				<div class="container-nav2">
					<li><a href="sobre.php">Sobre</a></li>
					<li><a href="#contato">Contato</a></li>
					<li><a href="<?php echo $link;?>" class="btn-login"
						onclick="fnModal(this)">
							<?php echo $label;?></a></li>
					<div class="line"></div>
				</div>
			</ul>

			</div>
		</nav>
		<div class="jumbotron">
			<h1 class="jumbotron-heading">Bem-vindo à Pizza Baue</h1>
			<p class="jumbotron-text">Monte sua pizza, veja as melhores
				promoções e muito mais.</p>
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
	<section class="description section-hidden">
		<div class="container-description description-baue">
			<h1>Monte sua pizza</h1>
			<hr>
			<p>Nosso sistema oferece uma proposta inovadora e beneficente para
				nossos clientes. A plataforma consiste em que o próprio cliente
				monte sua pizza, podendo fazer a combinação que quiser a partir
				dos ingredientes que disponibilizarmos. Conforme o usuário vai
				montando suas pizzas, seu nível de medalhas vai subindo, quando
				obter um número específico de pizzas montadas ou compradas, ele
				ganha uma mega promoção. As pizzas personalizadas de nossos
				clientes, irão para uma página de avaliação, se a pizza
				difereciada atingir muitas estrelas de outros clientes da Pizza
				Baue, essa pizza pode ir para o nosso cardápio. Desse modo, o
				usuário, pode ganhar muito mais medalhas.</p>
			<p>
				<a href="sobre.php"><button class="button-page">Saiba mais...</button></a>
			</p>
			<img src="./images/banner-monte.png">

		</div>
	</section>
	<!--- PARALAX -->
	<section class="section-visible fadeIn">

		<div class="paralax-1 ">
			<div class="jumbotron">
				<br> <br> <br> <br>
				<h1 class="jumbotron-heading">Pizza do dia</h1>
				<p class="jumbotron-text">R$ 9,00</p>
				<br>
				<button class="button-page">Clique aqui</button>
				</p>
			</div>
		</div>
	</section>

	<section class="sec section-hidden">
		<div class="promos container-slider">
			<h1>Nossos melhores preços</h1>
			<div id="slider">
				<ul id="slideWrap">
					<li id="itemsSlider">
						<div class="card">
							<img src="./images/mussarela.png" alt="" class="image">
							<h2>Mussarela</h2>
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
							<p>Pepperoni, cebola, pimentão, champignon, incrível seleção
								de carnes (bovinas e suínas) e mussarela.</p>
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


					</li>
					<li id="itemsSlider">
						<div class="card">
							<img src="./images/portuguesa.png" alt="" class="image">
							<h2>Portuguesa</h2>
							<p>Presunto especial acompanhado de cebola e azeitonas verdes,
								coberto pela exclusiva mussarela Pizza Baue.</p>
							<div class="price-card-slider">
								<h3>R$ 30,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>

						<div class="card">
							<img src="./images/margherita.png" alt="" class="image">
							<h2>Margherita</h2>
							<p>Mussarela, manjericão, tomates selecionados e queijo
								parmesão.</p>
							<div class="price-card-slider">
								<h3>R$ 24,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>

						<div class="card">
							<img src="./images/vegetariana.png" alt="" class="image">
							<h2>Vegetariana</h2>
							<p>Saborosa combinção de mussarela, tomates selecionados,
								champignon, pimentão, cebola e azeitonas verdes.</p>
							<div class="price-card-slider">
								<h3>R$ 32,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>

					</li>
					<li id="itemsSlider">
						<div class="card">
							<img src="./images/pepperoni.png" alt="" class="image">
							<h2>Pepperoni</h2>
							<p>Deliciosas fatias de pepperoni (salame especial condimentado
								com páprica) e mussarela.</p>
							<div class="price-card-slider">
								<h3>R$ 35,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>


						<div class="card">
							<img src="./images/peito-de-peru.png" alt="" class="image">
							<h2>Peito de Peru</h2>
							<p>Exclusiva mussarela, fatias de peito de peru e o legitimo
								Cream Cheese Philadelphia, finalizado com tomates e azeitonas
								pretas.</p>
							<div class="price-card-slider">
								<h3>R$ 35,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>


						<div class="card">
							<img src="./images/catupiry.png" alt="" class="image">
							<h2>Frango com Catupiry</h2>
							<p>Frango desfiado, cebola e catupiry.</p>
							<div class="price-card-slider">
								<h3>R$ 32,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>

					</li>
					<li id="itemsSlider">
						<div class="card">
							<img src="./images/carne-seca.png" alt="" class="image">
							<h2>Carne Seca</h2>
							<p>Mussarela, carne-seca, cebola e Philadelphia.</p>
							<div class="price-card-slider">
								<h3>R$ 33,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>


						<div class="card">
							<img src="./images/bacon.png" alt="" class="image">
							<h2>Meat & Bacon</h2>
							<p>Mussarela, bacon, calabresa, pepperoni e presunto.</p>
							<div class="price-card-slider">
								<h3>R$ 29,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>

						<div class="card">
							<img src="./images/bauru.png" alt="" class="image">
							<h2>Bauru</h2>
							<p>Mussarela, presunto, requeijão e tomate.</p>
							<div class="price-card-slider">
								<h3>R$ 26,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>

					</li>
					<li id="itemsSlider">
						<div class="card">
							<img src="./images/frango-grelhado.png" alt="" class="image">
							<h2>Frango Grelhado</h2>
							<p>Mussarela, frango, requeijão, tomate, azeitona preta e
								manjericão.</p>
							<div class="price-card-slider">
								<h3>R$ 30,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>


						<div class="card">
							<img src="./images/labianca.png" alt="" class="image">
							<h2>La Bianca</h2>
							<p>Mussarela, mussarela de búfala, requeijão, parmesão ralado
								e manjericão.</p>
							<div class="price-card-slider">
								<h3>R$ 30,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>


						<div class="card">
							<img src="./images/napolitana.png" alt="" class="image">
							<h2>Napolitana</h2>
							<p>Mussarela, tomate e parmesão ralado.</p>
							<div class="price-card-slider">
								<h3>R$ 28,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>

					</li>
					<li id="itemsSlider">
						<div class="card">
							<img src="./images/queijos.png" alt="" class="image">
							<h2>4 Queijos</h2>
							<p>Mussarela, requeijão, gorgonzola e parmesão ralado.</p>
							<div class="price-card-slider">
								<h3>R$ 25,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>


						<div class="card">
							<img src="./images/veggie.png" alt="" class="image">
							<h2>Veggie</h2>
							<p>Mussarela, champignon, azeitona preta, cebola e pimentão
								verde.</p>
							<div class="price-card-slider">
								<h3>R$ 35,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>

						<div class="card">
							<img src="./images/presunto.png" alt="" class="image">
							<h2>Presunto</h2>
							<p>Mussarela e presunto.</p>
							<div class="price-card-slider">
								<h3>R$ 25,00</h3>
							</div>
							<button class="btn-slider">Adicionar ao carrinho</button>
						</div>

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
					</li>
				</ul>
				<a id="prev" class="sliderPrev">&#8810;</a> <a id="next"
					class="sliderNext">&#8811;</a>
			</div>
		</div>


		</div>
	</section>


	</section>
	<br>
	<br>
	<br>
	<br>
	<br>
	<section class="icons section-hidden">
		<h1 class="text-align">Nossos serviços</h1>

		<div class="card-icon">
			<div class="row">
				<div class="inter-row">
					<div class="service-box">
						<i class="fas fa-cogs"></i>
						<h4 class="title-icon">Construa a pizza</h4>
						<p>Uma plataforma em que o cliente pode montar sua própria pizza.</p>
					</div>
				</div>
			</div>
		</div>


		<div class="card-icon">
			<div class="row">
				<div class="inter-row">
					<div class="service-box">
						<i class="fas fa-mobile"></i>
						<h4 class="title-icon">On-line</h4>
						<p>Permite que o usuário faça seu pedido e Monte sua pizza,
							totalmente de uma fome segura, e on-line, de qualquer
							dispositivo.</p>
					</div>
				</div>
			</div>
		</div>


		<div class="card-icon">
			<div class="row">
				<div class="inter-row">
					<div class="service-box">
						<i class="fas fa-user"></i>
						<h4 class="title-icon">Perfil</h4>
						<p>Cada usuário tem um perfil exclusivo, tendo acesso ao
							histórico de pedidos e todos os seus dados.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="card-icon">
			<div class="row">
				<div class="inter-row">
					<div class="service-box">
						<i class="fas fa-utensils"></i>
						<h4 class="title-icon">Pizzas Clássicas</h4>
						<p>Além do nosso sistema que vem pra inovar o mercado, também
							temos as pizzas clássicas, e pizzas Premium, na qual o cliente
							ganha conforme seu XP cresce.</p>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- COMMENTS -->
	<section class="section-hidden comenta">
		<h1 class="text-align">Veja a opnião dos nossos clientes</h1>

		<div class="container">
			<div class="comments">
				<div class="slideshow-container">
					<div class="mySlides fade">
						<div class="left">
							<div class="numbertext">1 / 3</div>
							<div class="comment-img">
								<img src="./images/avatar.png">
							</div>
							<div class="box-comment">
								<br> <br> <br>
								<p>"A proposta é bem diferente do tradicional, bem inovadora,
									tem futuro"</p>
								<p class="comment-author">
									<span>Autor anônimo</span>
								</p>
							</div>
						</div>
					</div>

					<div class="mySlides fade">
						<div class="numbertext">2 / 3</div>
						<div class="comment-img">
							<img src="./images/avatar.png">
						</div>
						<div class="box-comment">
							<br> <br> <br>
							<p>"O sistema oferece um ótimo serviço"</p>
							<p class="comment-author">
								<span>Autor anônimo</span>
							</p>
						</div>
					</div>


					<div class="mySlides fade">
						<div class="numbertext">3 / 3</div>
						<div class="comment-img">
							<img src="./images/avatar.png">
						</div>
						<div class="box-comment">
							<br> <br> <br>
							<p>"A ideia de montar a minha própria pizza, me chamou muita
								atenção, pois é bom para os vegetarianos e veganos saber o
								que tem na pizza."</p>
							<p class="comment-author">
								<span>Autor anônimo</span>
							</p>
						</div>
					</div>
				</div>
				<div style="text-align: center">
					<span class="dot" onclick="currentSlide(1)"></span> <span
						class="dot" onclick="currentSlide(2)"></span> <span class="dot"
						onclick="currentSlide(3)"></span>
				</div>
			</div>

		</div>
	</section>


	</main>
	<a name="contato"></a>
	<footer>

		<div class="cont-footer">
			<div class="bloco">
				<p class="titulo">CONTATO</p>
				<p class="bl-conteudo ajuste">
				<i class="fas fa-phone ga"></i>
				<p class="tel">+55(11)94631-0146</p>
				<i class="fas fa-phone ga"></i>
				<p class="tel">+55(11)95275-0119</p>
				<i class="fas fa-phone ga"></i>
				<p class="tel">+55(11)94893-2802</p>
				<i class="fas fa-phone ga"></i>
				<p class="tel">+55(11)95876-6887</p>
				<i class="fas fa-phone ga"></i>
				<p class="tel">+55(11)94539-8380</p>
				</p>
			</div>
			<div class="bloco">
				<p class="titulo">EM CASO DE DÚVIDAS</p>
				<p class="bl-conteudo">Caso precise tirar dúvidas, entre em contato
					conosco através de nosso e-mail: pizzabaue@gmail.com</p>

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

</body>
<script src="js/global.js"></script>
<script src="js/index.js"></script>

</html>
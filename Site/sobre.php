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
<title>Sobre</title>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Nunito"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
	integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
	crossorigin="anonymous">
<link rel="stylesheet" href="css/sobre.css">
<link rel="stylesheet" href="css/global.css">

</head>
<body>
	<div class="modal closed" id="modal-login">
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

					<form action="javascript:void(0);" method="get"
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
			<h1 class="jumbotron-heading">Sobre nós</h1>
			<p class="jumbotron-text">Como funciona a Pizza Baue?</p>

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
	<nav class="navegacao">
		<p>Home > Sobre Nós</p>
	</nav>

	<section class="conteudo section-hidden">
		<div class="sobre-titulo">
			<h2>Quem Somos?</h2>
		</div>
		<div class="descricao">
				<h3>Monte sua pizza</h3>
				<hr>
				<div class="sobre-conteudo">
					<p>Nosso sistema oferece uma proposta inovadora e beneficente
						para nossos clientes. A plataforma consiste em que o próprio
						cliente monte sua pizza, podendo fazer a combinação que quiser a
						partir dos ingredientes que disponibilizarmos. Conforme o usuário
						vai montando suas pizzas, seu nível de medalhas vai subindo, quando
						obter um número específico de pizzas montadas ou compradas, ele
						ganha uma mega promoção. As pizzas personalizadas de nossos
						clientes, irão para uma página de avaliação, se a pizza difereciada
						atingir muitas estrelas de outros clientes da Pizza Baue, essa
						pizza pode ir para o nosso cardápio. Desse modo, o usuário, pode
						ganhar muito mais medalhas.</p>
				</div>
				<img src="./images/pizza-description.jpg" class="imge-monte">
	
			</div>
			<div class="descricao-2">
				<h3>Como posso montar minha pizza?</h3>
				<hr>
				<div class="sobre-conteudo-2">
					<p>Selecione a massa de sua preferência, em seguida escolha o
						tamanho ideal. Escolha um de nossos molhos especiais e um de nossos
						queijos deliciosos. Selecione uma de nossas carnes de qualidade e
						sabor único, para incrementar e deixar a pizza mais saborosa,
						escolha um de nossos complementos, por fim, deixe sua pizza com um
						toque especial escolhendo um dos temperos da Pizza Baue.</p>
				</div>
				<img src="./images/pizza-description.jpg"  class="imagem-2">
			</div>
		
	</section>
	<section>
		<div class="jumbotrom-sobre section-hidden">
			<h3>Monte sua pizza, as melhores promoções e muito mais.</h3>
		<a href="montepizza.html"><button class="button-page">Monte sua pizza</button></a>
		</div>
	</section>
	<section class="conteudo section-hidden">
		<div class="descricao">
			<h3>Missão</h3>
			<hr>
			<div class="sobre-conteudo">
				<p>Servir com honestidade e entusiasmo. Sermos reconhecidos como
					referência em qualidade e credibilidade na arte da pizza, fazendo
					com que nosso cliente volte em busca de um serviço diferenciado.</p>
			</div>
			<img src="./images/pizza-description.jpg">
		</div>

		<div class="descricao-2 section-visible fadeIn">
			<h3>Visão</h3>
			<hr>
			<div class="sobre-conteudo-2">
				<p>Consolidar-se como a marca mais lembrada de pizzas especiais
					da região. Ganhar mercado e reconhecimento pela padronização,
					cumprimento da missão e geração de oportunidades para sócios e
					colaboradores.</p>
			</div>
			<img src="./images/pizza-description.jpg" class="imagem-2">

		</div>

		<div class="descricao section-hidden">
			<h3>Valores</h3>
			<hr>
			<div class="sobre-conteudo">
				<p>Comprometimento, honestidade, ética, responsabilidade
					socio-ambiental, trabalho em equipe, criatividade, inovação e
					excelência.</p>
			</div>
			<img src="./images/pizza-description.jpg">
		</div>
	</section>
	<section class="time section-hidden">
		<div class="conteudo">
			<div class="sobre-titulo">
				<h2>Nosso time</h2>

			</div>
			<div class="integrantes">
				<div class="usr-card">
					<div class="box-img">
						<div class="foto">
							<img src="./images/bruno.jpg">
						</div>
					</div>
					<div class="nome">
						<h4>Bruno da Costa</h4>
						<p>Back-end</p>
					</div>
				</div>
				<div class="usr-card">
					<div class="box-img">
						<div class="foto">
							<img src="./images/gabi.jpg">
						</div>
					</div>
					<div class="nome">
						<h4>Gabrielle Torres</h4>
						<p>Front-end</p>
					</div>
				</div>
				<div class="usr-card">
					<div class="box-img">
						<div class="foto">
							<img src="./images/cintia.jpg">
						</div>
					</div>
					<div class="nome">
						<h4>Cintia Martins</h4>
						<p>Designer</p>
					</div>
				</div>
				<div class="usr-card">
					<div class="box-img">
						<div class="foto">
							<img src="./images/alisson.jpg">
						</div>
					</div>
					<div class="nome">
						<h4>Alisson Campos</h4>
						<p>Designer</p>
					</div>
				</div>
				<div class="usr-card">
					<div class="box-img">
						<div class="foto">
							<img src="./images/edu.jpg">
						</div>
					</div>
					<div class="nome">
						<h4>Eduardo Trindade</h4>
						<p>Front-end</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	</section>
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
<script type="text/javascript" src="js/global.js"></script>

</html>
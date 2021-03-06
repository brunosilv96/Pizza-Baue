<?php 
require_once 'php/lib/bancoDeDados.php';

session_start();

$label = "Login";
$link = "#modal-login";

$conex = new BancoDeDados();

if(isset($_SESSION["id_usuario"])){
	$link = "principal.php";

	

	$codigo = $_SESSION["id_usuario"];

	if($conex->abrirConexao()){
		$conex->executarSql("SELECT nome, funcionario FROM usuario WHERE id_usuario = '$codigo'");
		
		$resultado = $conex->lerResultados();
		
        $label = $resultado[0][0];
        
        if ($resultado[0][1] == "Sim"){
			$link = "administrador.php";
		}else{
			$link = "principal.php";
		}
		
		$conex->fecharConexao();
	}else{
		echo "Erro de conexão com o Banco de Dados";
	}
}

if($conex->abrirConexao()){
    $conex->executarSQL("SELECT * FROM cardapio");

    $pizzas = $conex->lerResultados();
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Cardápio</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="./images/favicon2.png" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
    <link href="/fonts/nunito/css/nunito.all.css" rel="stylesheet">
    <link href="fonts/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="css/cardapio.css">
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
                    <a href="#" id="login-form" class="tab tab-selected" onclick="fnTabs(this)">Login</a> <a href="#"
                        id="register-form" class="tab" onclick="fnTabs(this)">Cadastrar</a>
                </div>
                <div class="login-form tab-active tabs-page" id="login-form-tab">
                    <div class="user-profile">
                        <img src="./images/avatar.png">
                    </div>
                    <form action="php/login.php" method="post" class="form-control">
                        <div class="input-group">
                            <span class="fas fa-user"></span> <input type="text" placeholder="Email" name="txtUser">
                        </div>
                        <div class="input-group">
                            <span class="fas fa-lock"></span> <input type="password" placeholder="Senha"
                                name="txtSenha">
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
                    <form method="POST" action="./php/cadastro.php" class="form-control" id="frmcadastro"
                        onsubmit="return verificaForm(event)">
                        <div class="input-group">
                            <span class="fas fa-user"></span> <input type="text" name="txtNome" id="txtNome"
                                placeholder="Nome" class="form_input">
                        </div>

                        <div class="input-group">
                            <span class="fas fa-user"></span> <input type="text" name="txtEmail" id="txtEmail"
                                placeholder="E-mail" class="form_input">
                        </div>
                        <div class="input-group">
                            <span class="fas fa-user"></span> <input type="text" name="txtCpf" placeholder="cpf"
                                id="cpf" maxlength="14" class="form_input" onkeydown="javascript: fMasc( this, mCPF );">
                        </div>

                        <div class="input-group">
                            <span class="fas fa-lock ga"></span> <input type="password" name="senha1"
                                placeholder="Senha" id="senha" class="form_input">
                        </div>
                        <div class="input-group">
                            <span class="fas fa-lock"></span> <input type="password" name="senha2"
                                placeholder="Confirmar Senha" id="confirmasenha" class="form_input">
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
                    <form action="javascript:void(0);" method="get" class="form-control">
                        <div class="input-group">
                            <span class="fas fa-user"></span> <input type="text" placeholder="Username">
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
        <input type="checkbox" id="bt-menu">
        <label for="bt-menu">&#9776;</label>


        <nav class="navbar">
			<ul>
				<!--<div class="container-nav">-->
					<li><a href="index.php">Home</a></li>
					<li><a href="cardapio.php">Cardápio</a></li>
					<li><a href="montagem.php">Monte sua pizza</a></li>
				<!--</div>-->
				<!--<div class="logo">-->
					<li class="logo"><a href="index.php" class="logo"><img src="./images/logo4.png"></a></li>
					<li><a href="sobre.php">Sobre</a></li>
					<li><a href="#contato">Contato</a></li>
					<li><a href="<?php echo $link;?>" class="btn-login"
						onclick="fnModal(this)">
							<?php echo $label;?></a></li>
					<div class="line"></div>
				
			</ul>

			
		</nav>
        <div class="jumbotron">
            <h1 class="jumbotron-heading">Escolha a sua pizza preferida</h1>
            <p class="jumbotron-text">Veja as melhores promoções e os melhores sabores</p>

        </div>

        <section>

            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
                style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
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
        <section class="description ">
            <!--section-hidden-->
            <div class="container-monte">
                <h1 class="text-cardapio">Pizzas customizadas</h1>
                <img src="./images/banner-monte.png">
                <h4 class="text-cardapio-2">Do seu jeito</h4>
                <a href="montepizza.html"> <button class="btn-2 ">Como customizar?</button></a>
            </div>
        </section>


        <nav class="navegacao">
            <p>Home > Cardápio</p>
        </nav>
        <section class="bd-cardapio">
            <?php
                foreach ($pizzas as $cardapio) {
            ?>

                <div class="cd-card">
                <div class="pz-foto">
                    <div class="foto-pz">
                        <img src="images/<?php echo $cardapio['crdimagem']?>">
                        <h2><?php echo "R$ " . $cardapio['crdpreco']?></h2>
                    </div>
                </div>
                <div class="pz-descricao">
                    <div class="pz-titulo">
                        <h2><?php echo $cardapio['crdnome']?></h2>
                    </div>
                    <div class="pz-desc">
                        <p> <?php echo $cardapio['crddescricao']?></p>
                    </div>
                    <div class="opt">
                        <form action="#" method="post">
                        <select name="tam-pz">
                                <option>Tamanho da Pizza</option>
                                <option>Pequena</option>
                                <option>Média</option>
                                <option>Grande</option>
                            </select>
                            <select name="forma-pz">
                                <option>Sabor</option>
                                <option>Pizza Baue com Calabresa</option>
                                <option>Pizza Baue com Mussarela</option>
                                <option>Pizza Baue com Vegetariana</option>
                            </select>
                            <input type="submit" name="adc-carrinho" value="Adicionar ao Carrinho"
                                class="btn-2-cardapio">
                        </form>
                    </div>
                </div>
            </div>
            <?php 
                } 
            ?>

        </section>
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
                        <i class="fab fa-facebook-square gab" alt="Facebook" title="Facebook"></i> <i
                            class="fab fa-instagram gab" alt="Instagram" title="Instagram"></i> <i
                            class="fab fa-twitter gab" alt="Twitter" title="Twitter"></i> <i class="fas fa-envelope gab"
                            alt="E-mail" title="E-mail"></i>
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
        <script type="text/javascript" src="js/global.js"></script>

</html>

<?php
require_once 'php/lib/bancoDeDados.php';

session_start();

if (! isset ( $_SESSION ["id_usuario"] )) {
    header ( "Location: index.php" );
    return;
}

$label = "Login";
$link = "#modal-login";
$nomeImagem = "avatar.png";

$conex = new BancoDeDados();

$codigo = $_SESSION["id_usuario"];

if($conex->abrirConexao()){
    $conex->executarSQL("SELECT * FROM usuario WHERE id_usuario = '$codigo'");
    
    $resultado = $conex->lerResultados();
    
    $nome = $resultado[0][1];
    
    $conex->executarSQL("SELECT nome FROM imagem WHERE id_usuario_fk = '$codigo';");
    $resultado = $conex->lerResultados();

    if(count($resultado) > 0){
        $nomeImagem = $resultado[0][0];

    }
    
    $conex->fecharConexao();
}else{
    echo "Erro de conexão com o Banco de Dados";
}
    
?>

<html>
    <head>
        <title>Perfil Pizza Baue</title>
        <meta charset="utf-8">
        <meta name="author" content="Bruno Silva">
        <link rel="shortcut icon" href="./images/favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
        <meta name="description" content="Pagina Inicial de Login do Cliente">
        
        <!--Folhas de Estilo - CSS-->
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/principal.css">
    </head>
    <body>
        <header>
           
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
						onclick="fnModal(this)"><?php echo $nome;?></a></li>
					<div class="line"></div>
				</div>
			</ul>

			</div>
		</nav>
            <div class="jumbotron">
                <h1 class="jumbotron-heading">Bem-vindo à Pizza Baue</h1>
                <p class="jumbotron-text">Monte sua pizza, veja as melhores promoções e muito mais.</p>
            </div>
        </header>
        <nav class="navegacao">
            <p>Home > Perfil</p>
        </nav>
        <section>
            <div class="nav-lat">
                <div class="foto-user">
                    <img class="foto-perfil" src="images/user/<?php echo $nomeImagem;?>" />
                </div>
                <div class="nome-user">
                    <a href="princ_insereFoto.php" target="iframe-conteudo">Alterar Foto</a>
                </div>
                <div class="menu-usuario">
                    <h3><?php echo $nome;?></h3>
                    <ul>
                        <li><a href="princ_pedidos.php" target="iframe-conteudo">Pedidos</a></li>
                        <li><a href="princ_cadastro.php" target="iframe-conteudo">Cadastro</a></li>
                        <li><a href="princ_endereco.php" target="iframe-conteudo">Endereço</a></li>
                        <li><a href="php/sair.php">Sair</a></li>
                    </ul>
                </div>
            </div>
            <div class="conteudo">
                <iframe name="iframe-conteudo" src="princ_pedidos.php">
                    
                    <!--
                        Aqui é linkado as páginas referentes ao usuario
                    -->
                </iframe>
            </div>
        </section>
        <footer>
			<div class="cont-footer">
				<div class="bloco">
					<p class="titulo">CONTATO</p>
					<p class="bl-conteudo">
						<i class="fas fa-phone ga"></i> <p class="tel">+55(11)94631-0146</p>
						<i class="fas fa-phone ga"></i><p class="tel"> +55(11)95275-0119</p> 
						<i class="fas fa-phone ga"></i> <p class="tel">+55(11)94893-2802 </p>
						<i	class="fas fa-phone ga"></i> <p class="tel">+55(11)95876-6887 </p>
						<i	class="fas fa-phone ga"></i> <p class="tel">+55(11)94539-8380</p>
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
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
        <title>Perfil Administrativo</title>
        <meta charset="utf-8">
        <meta name="author" content="Bruno Silva">
        <link rel="shortcut icon" href="./images/favicon2.png" />
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
        <meta name="description" content="Pagina Inicial de Login do Cliente">
        
        <!--Folhas de Estilo - CSS-->
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/admin.css">
    </head>
    <body>
        <header class="header-user">
           <section class="user-header">
        <nav class="navbar-user">
			<ul>
				<div class="container-nav-user">
					<li><a href="index.php">Home</a></li>
					<li><a href="cardapio.php">Cardápio</a></li>
					<li><a href="montepizza.php">Monte sua pizza</a></li>
				
					
				</div>
				<div class="logo">
					<a href="index.php" class="logo"><img src="./images/logo4.png">
					</a>
				</div>
			</ul>

			<ul class="ul-2">
				<div class="container-nav2-user">
						<li><a href="sobre.php">Sobre</a></li>
					<li><a href="#contato">Contato</a></li>
					<li><a href="<?php echo $link;?>" class="btn-login"
						onclick="fnModal(this)"><?php echo $nome;?></a></li>
					<div class="line"></div>
				</div>
			</ul>

			</div>
		</nav>
</section>
        </header>
        <!--<nav class="navegacao">
            <p>Home > Perfil</p>

        </nav>-->
        <section>
            <div class="nav-lat">
                <div class="foto-user" id="frnCadastro">
                    <img class="foto-perfil" id="imgFoto" src="images/user/<?php echo $nomeImagem;?>" />
                </div>
                <div class="nome-user">
                    <a href="princ_insereFoto.php" target="iframe-conteudo">Alterar Foto</a>
                </div>
                <div class="menu-usuario">
                    <h3><?php echo $nome;?></h3>
                    <ul>
                    <li><i class="fas fa-phone menu-icon"></i><a href="admin_pedidos.php" target="iframe-conteudo">Principais Pedidos</a><span class="new-badge">0 new</span></li>
                        <li><i class="fas fa-cart-plus menu-icon"></i><a href="cad_func.php" target="iframe-conteudo">Cadastrar Usuários</a></li>
                        <li><i class="fas fa-users-cog menu-icon"></i><a href="princ_cadastro.php" target="iframe-conteudo">Cadastro</a></li>
                        <li><i class="fas fa-map-marker-alt menu-icon"></i><a href="admin_cardapio.php" target="iframe-conteudo">Cardápio</a></li>
                        <li><i class="fas fa-sign-out-alt menu-icon"></i><a href="php/sair.php">Sair</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="section-conteudo">
            <div class="conteudo">
                <iframe name="iframe-conteudo" src="admin_pedidos.php">
                    <!--
                        Aqui é linkado as páginas referentes ao usuario
                    -->
                </iframe>
            </div>
</div>
</section>
    </body>
    <script type="text/javascript" src="js/global.js"></script>
    <script type="text/javascript" src="js/user.js"></script>
</html>
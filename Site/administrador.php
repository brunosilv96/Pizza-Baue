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
        <link rel="stylesheet" type="text/css" href="css/if_global.css">
    </head>
    <body>
    <header class="header-user">
        <section class="user-header">
            <nav class="navbar-user">
        
                <ul>
               
                        <li><a href="index.php">Home</a></li>
                        <li><a href="cardapio.php">Cardápio</a></li>
                        <li><a href="montepizza.php">Monte sua pizza</a></li>
                        <li><a href="index.php" class="logo"><img src="./images/logo4.png">
                        </a></li>
                        <li><a href="sobre.php">Sobre</a></li>
                        <li><a href="#contato">Contato</a></li>
                        <li><a href="<?php echo $link;?>" class="btn-login"
                                onclick="fnModal(this)"><?php echo $nome;?></a></li>
                        <div class="line"></div>

                </ul>

               
            </nav>
        </section>
    </header>
        <!--<nav class="navegacao">
            <p>Home > Perfil</p>

        </nav>-->
        <section>
        <div class="nav-lat nav-adaptativo" id="menu-collapse">
         
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
                 <div class="foto-user" id="frnCadastro">
                     <img class="foto-perfil" id="imgFoto" src="images/user/<?php echo $nomeImagem;?>" />
                 </div>
                 <div class="nome-user">
                     <a href="princ_insereFoto.php" target="iframe-conteudo">Alterar Foto</a>
                 </div>
                 <div class="menu-usuario">
                     <h3><?php echo $nome;?></h3>
                     <ul>
                    <li><i class="fas fa-cart-plus menu-icon"></i><a href="admin_pedidos.php" target="iframe-conteudo">Principais Pedidos<span class="new-badge">0 new</span></a></li>
                        <li><i class="fas fa-users-cog menu-icon"></i><a href="cad_func.php" target="iframe-conteudo">Cadastrar Usuários</a></li>
                        <li><i class="fas fa-users-cog menu-icon"></i><a href="princ_cadastro.php" target="iframe-conteudo">Cadastro</a></li>
                        <li><i class="fas fa-users-cog menu-icon"></i><a href="admin_cardapio.php" target="iframe-conteudo">Cardápio</a></li>
                        <li><i class="fas fa-users-cog menu-icon"></i><a href="admin_ingrediente.php" target="iframe-conteudo">Ingredientes</a></li>
                        <li><i class="fas fa-list menu-icon"></i><a href="admin_listarUsers.php" target="iframe-conteudo">Lista de Usuários</a></li>
                        <li><i class="fas fa-sign-out-alt menu-icon"></i><a href="php/sair.php">Sair</a></li>
                    </ul>
                </div>
            </div>
            <div class="openbtn">
			<div class="collapse-items">
				<a href="#" onclick="openNav()" class="menu-icon-collapse"><i class="fas fa-bars menu-icon-collapse" alt="Visão Geral" title="Visão Geral"></i></a>
				<a href="admin_pedidos.php" target="iframe-conteudo" class="menu-icon-collapse"><i class="fas fa-cart-plus menu-icon-collapse" alt="Pedidos" title="Pedidos"></i></a>
				<a href="cad_func.php" target="iframe-conteudo" class="menu-icon-collapse"><i class="fas fa-users-cog menu-icon-collapse" alt="Configurar Cadastro" title="Configurar Cadastro"></i></a>
				<a href="princ_cadastro.php" target="iframe-conteudo" class="menu-icon-collapse"><i class="fas fa-users-cog menu-icon-collapse" alt="Configurar Endereço" title="Configurar Endereço"></i></a>
                <a href="admin_cardapio.php"  target="iframe-conteudo" class="menu-icon-collapse"><i class="fas fa-users-cog menu-icon-collapse" alt="Inserir pizzas ao cardápio" title="Telefone"></i></a>
                <a href="admin_ingrediente.php" target="iframe-conteudo" class="menu-icon-collapse"><i class="fas fa-users-cog menu-icon-collapse" alt="Inserir ingredientes" title="Configurar Endereço"></i></a>
				<a href="admin_listarUsers.php"  target="iframe-conteudo" class="menu-icon-collapse"><i class="fas fa-list menu-icon-collapse" alt="Lista de usuários" title="Telefone"></i></a>
				<a href="php/sair.php" class="menu-icon-collapse"><i class="fas fa-sign-out-alt menu-icon-collapse" alt="Sair" title="Sair"></i></a>  
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
    <script>
   
   function openNav() {
  document.getElementById("menu-collapse").style.width = "280px";
}


function closeNav() {
  document.getElementById("menu-collapse").style.width = "0";
}
</script>
   
    <script type="text/javascript" src="js/global.js"></script>
    <script type="text/javascript" src="js/user.js"></script>
</html>
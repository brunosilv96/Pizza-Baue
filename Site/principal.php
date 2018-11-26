<?php 
session_start();

if (! isset ( $_SESSION ["id_usuario"] )) {
    header ( "Location: index.html" );
    return;
}
?>

<html>
    <head>
        <title>Pagina Inicial</title>
        <meta charset="utf-8">
        <meta name="author" content="Bruno Silva">
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
                              <li ><a href="index.html">Home</a></li>
                              <li ><a href="sobre.html">Sobre</a></li>
                              <li ><a href="cardapio.html">Cardápio</a></li>
                              </div>
                             <div class="logo">
                                    <a href="index.html" class="logo"><img src="./images/logo4.png"> </a>
                                  </div>
                              </ul>
                            
                              <ul class="ul2">
                                      <div class="container-nav2">
                                  <li ><a href="montepizza.html">Monte sua pizza</a></li>
                                  <li ><a href="contact.html">Contato</a></li>
                                  <li><a href="#modal-login" class="btn-login" onclick="fnModal(this)">Login</a></li>
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
            <p>Home > Principal</p>
        </nav>
        <section>
            <div class="nav-lat">
                <div class="foto-user">
                    <!--Sera a imagem que o usúario desejar-->
                  
                </div>
                <div class="nome-user">
                    <a href="#">Alterar Foto</a>
                </div>
                <div class="menu-usuario">
                    <h3>Nome Usuário</h3>
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
                    <p class="titulo">Bloco</p>
                    <p class="bl-conteudo">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                </div>
                <div class="bloco">
                    <p class="titulo">Bloco</p>
                    <p class="bl-conteudo">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                </div>
                <div class="bloco">
                    <p class="titulo">Bloco</p>
                    <p class="bl-conteudo">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                </div>
                <div class="ft-logo">
                    <p class="titulo">Bloco</p>
                    <p class="bl-conteudo">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                </div>
            </div>
            <div class="copyright">
                <p>Copyright</p>
            </div>
        </footer>
    </body>
    <script type="text/javascript" src="js/global.js"></script>
</html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="./images/favicon2.png" />
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <title>Admin</title>
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
                    <li><a href="#"><i class="fas fa-comments"></i></a></li>
                    <li><a href="#"><i class="fas fa-comments"></i></a></li>
                   
                    <li><a href="#">ADMINISTRADOR</a></li>
                    <img src="images/user/avatar.png" class="avatar img-fluid rounded-circle mr-1">
					
				</div>
			</ul>

			</div>
		</nav>
</section>
        </header>
    
        <section>
                <div class="nav-lat">
                        <div class="logo">
                                <a href="index.php" class="logo"><img src="./images/logo4.png">
                                </a>
                            </div>
                   
                    <div class="menu-usuario">
                       
                        <ul>
                            <li><i class="fas fa-cart-plus menu-icon"></i><a href="princ_pedidos.php" target="iframe-conteudo">Pedidos</a></li>
                            <li><i class="fas fa-phone menu-icon"></i><a href="princ_cardapio.php" target="iframe-conteudo">Cardápio</a></li>
                            <li><i class="fas fa-users-cog menu-icon"></i><a href="princ_cadastro.php" target="iframe-conteudo">Funcionários</a></li>
                            <li><i class="fas fa-map-marker-alt menu-icon"></i><a href="princ_endereco.php" target="iframe-conteudo">Clientes</a></li>
                            <li><i class="fas fa-sign-out-alt menu-icon"></i><a href="php/sair.php">Sair</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="section-conteudo">
                <div class="conteudo">
                    <iframe name="iframe-conteudo" src="princ_pedidos.php">
                        <!--
                            Aqui é linkado as páginas referentes ao usuario
                        -->
                    </iframe>
                </div>
    </div>
    </section>
                        
                      
       </body>
</html>


  <!--    <div class="dropdown">
                                        <i class="fas fa-cart-plus menu-icon"></i><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pages-drop
                                          </a>
                                        
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="princ_cadastro.php" target="iframe-conteudo">Clientes</a>
                                            <a class="dropdown-item"  href="princ_endereco.php" target="iframe-conteudo">Funcionários</a>
                                            <a class="dropdown-item" href="princ_telefone.php" target="iframe-conteudo">Configurações</a>
                                          </div>
                                        </div>-->
                   
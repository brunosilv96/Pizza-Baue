<?php

/* VALIDAÇÃO JAVASCRIPT DESATIVADA !!!!!!! */

require_once 'php/lib/bancoDeDados.php';
require_once 'php/class/Endereco.php';

session_start();

$codigo = $_SESSION["id_usuario"];

$conex = new BancoDeDados();

$pesquisa = null;

if (!$conex->abrirConexao()) {
    echo "Erro ao conectar com o Banco de Dados";
}

if(isset($_GET['flag'])){
    $conex->executarSQL("SELECT * FROM endereco WHERE id_endereco = '$_GET[flag]'");

    $pesquisa = $conex->lerResultados();

    $_SESSION["id_endereco"] = $_GET["flag"];

    unset($_GET["flag"]);
}

$conex->executarSQL("SELECT * FROM endereco WHERE id_usuario_fk = '$codigo'");

$resultados = $conex->lerResultados();
?>
<html>
<head>
<meta charset="utf-8">
<meta name="author" content="Bruno Silva">
<meta name="description" content="Pedidos do Wireframe">

<link rel="stylesheet" href="css/if_global.css">
<link rel="stylesheet" href="css/if_cadastro.css">
<link rel="stylesheet" href="css/global.css">
</head>
<body>
	<div class="container-conteudo">
		<h3>Alterar Endereço</h3>
		<form action="php/atualizaEndereco.php" method="post" id="endereco" onsubmit="return verificaEnde(event)">
			<table>
				<tr>
					<td class="lb"><label>Logradouro:</label></td>
                </tr>

                <tr>
                <td class="txt"><input type="text" id="log" class="input-cadastro"
						name="txtLogradouro" value="<?php echo $pesquisa[0]['logradouro'] ?>"></td>
                </tr>

				<tr>
                <td class="lb"><label>Número:</label></td>
                </tr>
                    
                <tr>
					<td class="txt"><input type="text" class="input-cadastro" id="num" 
						name="txtNumero" value="<?php echo $pesquisa[0]['numero']?>"></td>
                </tr>

				<tr>
					<td class="lb"><label>Referência:</label></td>
                </tr>
                
                <tr>
                <td class="txt"><input type="text" class="input-cadastro" id="com" 
						name="txtReferencia" value="<?php echo $pesquisa[0]['referencia']?>"></td>
                </tr>
			</table>
			
			<input type="submit" name="btnSalvar" class="btn-cadastro" value="Salvar">

            <h3>ENDEREÇOS CADASTRADOS</h3>
            <table>
                <tr>
                    <td class="tam-pqn">N°</td>
                    <td class="tam-med">Endereço</td>
                    <td class="tam-pqn">Numero</td>
                    <td class="tam-med">Referência</td>
                </tr>
                <?php 
                    foreach($resultados as $result){
                ?>
                        <tr>
                            <td class="tam-pqn"><?php echo $result['id_endereco'] ?></td>
                            <td class="tam-pqn"><?php echo $result['logradouro'] ?></td>
                            <td class="tam-med"><?php echo $result['numero'] ?></td>
                            <td class="tam-pqn"><?php echo $result['referencia'] ?></td>
                            <td class="tam-pqn"><a href="princ_endereco.php?flag=<?php echo $result['id_endereco'] ?>">Atualizar</a></td>
                        </tr>
                <?php 
                    }

                    $conex->fecharConexao();
                ?>
            </table>
		</form>
	</div>
</body>
<!-- <script src="js/global.js"></script> -->
</html>

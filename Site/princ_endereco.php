<?php

/* VALIDAÇÃO JAVASCRIPT DESATIVADA !!!!!!! */

require_once 'php/lib/bancoDeDados.php';
require_once 'php/class/Endereco.php';

session_start();

$codigo = $_SESSION["id_usuario"];

$conex = new BancoDeDados();

$pesquisa = null;
$opcao = "Salvar";

if (!$conex->abrirConexao()) {
    echo "Erro ao conectar com o Banco de Dados";
}

if (isset($_GET["acao"])) {
    $opcao = $_GET["acao"];
}

if(isset($_GET['cod_end'])){
    $conex->executarSQL("SELECT * FROM endereco WHERE id_endereco = '$_GET[cod_end]'");

    $pesquisa = $conex->lerResultados();

    $_SESSION["id_endereco"] = $_GET["cod_end"];
    $_SESSION["acao"] = $_GET["acao"];

    unset($_GET["cod_end"]);
    unset($_GET["acao"]);
}

$conex->executarSQL("SELECT * FROM endereco WHERE id_usuario_fk = '$codigo'");

$resultados = $conex->lerResultados();
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
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
					<td class="lb"><label>CEP:</label></td>
                </tr>

                <tr>
                <td class="txt"><input type="text" id="log" class="input-cadastro"
						name="txtCep" value="<?php echo $pesquisa[0]['cep'] ?>"></td>
                </tr>

				<tr>
					<td class="lb"><label>Logradouro:</label></td>
                </tr>

                <tr>
                <td class="txt"><input type="text" id="log" class="input-cadastro"
						name="txtLogradouro" value="<?php echo $pesquisa[0]['logradouro'] ?>"></td>
                </tr>

                <tr>
					<td class="lb"><label>Bairro:</label></td>
                </tr>

                <tr>
                <td class="txt"><input type="text" id="log" class="input-cadastro"
						name="txtBairro" value="<?php echo $pesquisa[0]['bairro'] ?>"></td>
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
			
			<input type="submit" name="btnSalvar" class="btn-cadastro" value="<?php echo $opcao ?>">

         
            <table class="atualiza">
            <tr>
                <td class="lb"><label>ENDEREÇOS CADASTRADOS</label></td>
                </tr>
                <tr>
                    <td class="tam-pqn input-atualiza">CEP</td>
                    <td class="tam-med input-atualiza">Endereço</td>
                    <td class="tam-pqn input-atualiza">Bairro</td>
                    <td class="tam-pqn input-atualiza">Numero</td>
                    <td class="tam-med input-atualiza">Referência</td>
                </tr>
                <?php 
                    foreach($resultados as $result){
                ?>
                        <tr>
                            <td class="tam-pqn"><?php echo $result['cep'] ?></td>
                            <td class="tam-pqn"><?php echo $result['logradouro'] ?></td>
                            <td class="tam-pqn"><?php echo $result['bairro'] ?></td>
                            <td class="tam-pqn"><?php echo $result['numero'] ?></td>
                            <td class="tam-med"><?php echo $result['referencia'] ?></td>
                            <td class="tam-pqn"><a href="princ_endereco.php?cod_end=<?php echo $result['id_endereco']?>&acao=alterar"><i class="fas fa-edit"></i></a></td>
                            
                            <td class="tam-pqn input-atualiza"><a href="princ_endereco.php?cod_end=<?php echo $result['id_endereco']?>&acao=deletar"><i class="fas fa-trash-alt"></i></td>
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

<?php

/* VALIDAÇÃO JAVASCRIPT DESATIVADA !!!!!!! */

require_once 'php/lib/bancoDeDados.php';

session_start();

$codigo = $_SESSION["id_usuario"];

$conex = new BancoDeDados();

$pesquisa = null;

if (!$conex->abrirConexao()) {
    echo "Erro ao conectar com o Banco de Dados";
}

if(isset($_GET['flag'])){
    $conex->executarSQL("SELECT * FROM telefone WHERE id_telefone = '$_GET[flag]'");

    $pesquisa = $conex->lerResultados();

    $_SESSION["id_telefone"] = $_GET["flag"];

    unset($_GET["flag"]);
}

$conex->executarSQL("SELECT * FROM telefone WHERE id_usuario_fk = '$codigo'");

$resultados = $conex->lerResultados();

?>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Telefones do Wireframe">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
        <link rel="stylesheet" href="css/if_cadastro.css">
<link rel="stylesheet" href="css/if_global.css">
<link rel="stylesheet" href="css/global.css">
</head>
<body>
	<div class="container-conteudo">
		<h3>Alterar Telefone</h3>
		<form action="php/atualizaTelefone.php" method="post" id="telefone" onsubmit="return verificaEnde(event)">
			<table>
				<tr>
					<td class="lb"><label>Número:</label></td>
                </tr>

                <tr>
                <td class="txt"><input type="text" id="log" class="input-cadastro"
						name="txtNumero" value="<?php echo $pesquisa[0]['numero'] ?>"></td>
                </tr>

				<tr>
                <td class="lb"><label>Tipo:</label></td>
                </tr>

                <tr>
                    <td class="txt"><select class="input-cadastro" name="txtTipo">
                        <option value="<?php echo $pesquisa[0]['tipo']?>"><?php echo $pesquisa[0]['tipo']?></option>
                        <option value="Telefone">Telefone</option>
                        <option value="Telefone 2">Telefone 2</option>
                        <option value="Celular">Celular</option>
                        <option value="Celular 2">Celular 2</option>
                    </select></td>
                </tr>

				<tr>
					<td class="lb"><label>Identificação:</label></td>
                </tr>
                
                <tr>
                <td class="txt"><input type="text" class="input-cadastro" id="com" 
						name="txtIdentificacao" value="<?php echo $pesquisa[0]['identificacao']?>"></td>
                </tr>
			</table>
			
			<input type="submit" name="btnSalvar" class="btn-cadastro" value="Salvar">
            
           
            
            <table class="atualiza">
            <tr>
					<td class="lb"><label>TELEFONES CADASTRADOS:</label></td>
                </tr>
                <tr>
                    <td class="tam-pqn input-atualiza">N°</td>
                    <td class="tam-med input-atualiza">Numero</td>
                    <td class="tam-pqn input-atualiza">Tipo</td>
                    <td class="tam-med input-atualiza">Identificação</td>
                    <td class="tam-med input-atualiza">Editar</td>
                    <td class="tam-med input-atualiza">Excluir</td>
                </tr>
                <?php 
                    foreach($resultados as $result){
                ?>
                        <tr>
                            <td class="tam-pqn input-atualiza"><?php echo $result['id_telefone'] ?></td>
                            <td class="tam-pqn input-atualiza"><?php echo $result['numero'] ?></td>
                            <td class="tam-med input-atualiza"><?php echo $result['tipo'] ?></td>
                            <td class="tam-pqn input-atualiza"><?php echo $result['identificacao'] ?></td>
                            <td class="tam-pqn input-atualiza"><a href="princ_telefone.php?flag=<?php echo $result['id_telefone'] ?>"><i class="fas fa-edit"></i></a></td>
                            <td class="tam-pqn input-atualiza"><i class="fas fa-trash-alt"></i></td>
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

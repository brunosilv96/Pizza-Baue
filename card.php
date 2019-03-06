<?php
require_once 'Site/php/lib/bancoDeDados.php';

$oCon = new BancoDeDados();

if(!$oCon->abrirConexao()){
    echo "Erro ao abrir conexão com banco de dados";
}

$oCon->executarSQL("SELECT * FROM cardapio");

$resultados = $oCon->lerResultados();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modelando Card de Cardápio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<style type="text/css">
    *{
    }

    body, html{
        border: none;
    }
    .card{
        width: 80%;
        height: 300px;
        margin: auto;
        margin-top: 20px;
        box-sizing: border-box;
        border: 1px solid black;
        text-align: center;
    }

    .imagem{
        width: 40%;
        height: 300px;
        box-sizing: border-box;
        float: left;
        border: 1px solid black;
    }

    .titulo{
        width: 60%;
        height: 70px;
        box-sizing: border-box;
        float: left;
    }

    .descricao{
        width: 60%;
        height: 100px;
        box-sizing: border-box;
        float: left;
        padding: 15px;
    }

    .preco{
        width: 60%;
        height: 70px;
        box-sizing: border-box;
        float: left;
    }

    .botao{
        width: 35%;
        height: 55px;
        float: left;
        box-sizing: border-box;
        margin-left: 12%;
        margin-top: 5px;
    }

    form{
        width: 100%;
        height: 55px;
        box-sizing: border-box;
    }

    input{
        width: 100%;
        height: 50px;
    }

    img{
        width: auto;
        height: 280px;
    }

</style>
<body>
    <?php 
        foreach($resultados as $result){
    ?>
    <div class="card">
        <div class="imagem">
            <img src="Site/images/<?php echo $result['crdimagem']; ?>">
        </div>
        <div class="titulo">
            <h1><?php echo $result['crdnome'];?></h1>
        </div>
        <div class="descricao">
            <p><?php echo $result['crddescricao'];?></p>
        </div>
        <div class="preco">
            <p>R$ <?php echo $result['crdpreco'];?></p>
        </div>
        <div class="botao">
            <form action="#" method="GET">
                <input type="submit" value="Adicionar ao Carrinho"> 
            </form>
        </div>
    </div>
    <?php 
        }
        $oCon->fecharConexao();
    ?>
</body>
</html>
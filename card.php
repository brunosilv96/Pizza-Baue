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
    <link rel="stylesheet" type="text/css" media="screen" href="site/css/cardapio.css">
    <link rel="stylesheet" type="text/css" media="screen" href="site/css/global.css">
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
<section class="bd-cardapio">
<div class="cd-card">
                <div class="pz-foto">
                    <div class="foto-pz">
                    <img src="Site/images/<?php echo $result['crdimagem']; ?>">
                    </div>
                </div>
                <div class="pz-descricao">
                    <div class="pz-titulo">
                    <h2><?php echo $result['crdnome'];?></h2>
                    </div>
                    <div class="pz-desc">
                    <p><?php echo $result['crddescricao'];?></p>
                    </div>
                    <div class="pz-price">
                    <h2>R$ <?php echo $result['crdpreco'];?></h2>
        </div>
                            <input type="submit" name="adc-carrinho" value="Adicionar ao Carrinho" class="btn-2-cardapio">
                        </form>
                    </div>
                
            </div>
    </section>
    <?php 
        }
        $oCon->fecharConexao();
    ?>
 
</body>
</html>
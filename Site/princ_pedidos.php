<?php 
require_once 'php/lib/bancoDeDados.php';

session_start();
$codigo = $_SESSION['id_usuario'];


$oCon = new BancoDeDados();

if(!$oCon->abrirConexao()){
    echo "Falha ao conectar com o Banco de Dados";
}

$oCon->executarSQL("SELECT * FROM pedido WHERE id_usuario_fk = '$codigo'");

$resultados = $oCon->lerResultados();

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Bruno Silva">
        <meta name="description" content="Pedidos do Wireframe">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="css/if_global.css">
        <link rel="stylesheet" href="css/if_pedidos.css">
        <link rel="stylesheet" href="css/global.css">
    </head>
    <body>
        <div>
          <h3>Perfil Pizza Baue</h3>
        </div>
       <div class="xp">
            
           <h3>MEDALHAS <i class="fas fa-medal"></i></h3>

           <h4>Nenhuma pizza comprada</h4>
       </div>

        <div class=" pedidos conteudo">
            <h3>PEDIDOS</h3>
            <table>
                <tr>
                    <td class="tam-pqn">Número</td>
                    <td class="tam-pqn">Data</td>
                    <td class="tam-med">Descrição</td>
                    <td class="tam-pqn">Situação</td>
                </tr>
                <?php 
                    foreach($resultados as $result){
                ?>
                        <tr>
                            <td class="tam-pqn"><?php echo $result['num_pedido'] ?></td>
                            <td class="tam-pqn"><?php echo $result['data_ped'] ?></td>
                            <td class="tam-med"><?php echo $result['descricao'] ?></td>
                            <td class="tam-pqn"><?php echo $result['situacao'] ?></td>
                        </tr>
                <?php 
                    }

                    $oCon->fecharConexao();
                ?>
            </table>
        </div>

        <div class="dados-cliente">
            <h3>PIZZAS MONTADAS</h3>
            <h2>0</h2>
        </div>
        <div class="dados-cliente">
            <h3>COMENTÁRIOS DE AVALIAÇÃO</h3>
             <h2>0</h2>
         </div>
        
     </div>
    </body>
</html>
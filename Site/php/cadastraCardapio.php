<?php 
require_once 'lib/bancoDeDados.php';

$oCon = new BancoDeDados();

if(!$oCon->abrirConexao()){
    echo "Erro ao abrir conexão com Banco de Dados";
}

try {
    
    /* Nomeia a imagem de acordo com as informáções do arquivo */
    $nomeDoArquivo = $_FILES["imgCardapio"]["name"];

    /* Indica o caminho da imagem de acordo com as informaçãoes do arquivo */
    $caminhoDoArquivo = $_FILES["imgCardapio"]["tmp_name"];

    /* Detalha o caminho correto onde a imagem irá ser armagenada */
    $destino = "../images/cardapio/$nomeDoArquivo";

    /* Faz a ação de mover o arquivo de arcordo com as configurações passadas */
    $resultado = move_uploaded_file($caminhoDoArquivo, $destino);

    $oCon->executarSQL("INSERT INTO cardapio(crdnome, crddescricao, crdpreco, crdimagem) VALUES ('$_POST[txtSabor]', '$_POST[txtDescricao]', '$_POST[txtPreco]', '$nomeDoArquivo')");

    header("Location: ../admin_cardapio.php");

} catch (\Throwable $th) {
    echo "Erro ao fazer o cadastro no Banco de Dados";
}

?>
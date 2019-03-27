<?php 
require_once 'lib/bancoDeDados.php';

$oCon = new BancoDeDados();

if(!$oCon->abrirConexao()){
    echo "Erro ao abrir conexão com Banco de Dados";
}


?>
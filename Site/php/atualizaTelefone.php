<?php
require_once 'lib/bancoDeDados.php';

/* Inicia a sessão */
session_start();

/* Atravez da sessão ativa, coleta o ID do usuário logado */
$codigo = $_SESSION["id_usuario"];

/* Instância do Banco de Dados */
$conex = new BancoDeDados();

/* Abre uma conexão com o Banco de Dados */
if (!$conex->abrirConexao()) {
    echo "Erro de conexão com o Banco de Dados";
} 

if(isset($_SESSION["id_telefone"])){
    /* Coleta os dados do formulário */
    $numero = $_POST["txtNumero"];
    $tipo = $_POST["txtTipo"];
    $identificacao = $_POST["txtIdentificacao"];

    /* Faz o update dos dados no Banco com os valores que o usuário quer inserir */
    $conex->executarSQL("UPDATE telefone SET numero = '$numero', tipo = '$tipo', identificacao = '$identificacao' WHERE id_telefone = '$_SESSION[id_telefone]'");

    $conex->fecharConexao();

    unset($_SESSION["id_telefone"]);
    
    /* Faz o redirecionamento */
    header("Location: ../princ_telefone.php");

}else{

    /* Coleta os dados do formulário */
    $numero = $_POST["txtNumero"];
    $tipo = $_POST["txtTipo"];
    $identificacao = $_POST["txtIdentificacao"];

    /* Faz a inserção dos dados no Banco com os valores que o usuário quer inserir */
    $conex->executarSQL("INSERT telefone(numero, tipo, identificacao, id_usuario_fk) VALUES('$numero', '$tipo', '$identificacao', '$codigo');");

    $conex->fecharConexao();
    
    /* Faz o redirecionamento */
    header("Location: ../princ_telefone.php");
}


?>
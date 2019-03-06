<?php
require_once 'lib/bancoDeDados.php';
require_once 'class/Endereco.php';

/* Inicia a sessão */
session_start();

/* Atravez da sessão ativa, coleta o ID do usuário logado */
$codigo = $_SESSION["id_usuario"];

/* Instância do Banco de Dados */
$conex = new BancoDeDados();
$endereco = new Endereco();

/* Cria um Array com os nomes dos campos dos formulário */
$campos = Array(
    "txtLogradouro",
    "txtNumero",
    "txtReferencia"
);

/* Abre uma conexão com o Banco de Dados */
if (!$conex->abrirConexao()) {
    echo "Erro de conexão com o Banco de Dados";
} 

if(isset($_SESSION["id_endereco"])){
    /* Coleta os dados do formulário */
    $logradouro = $_POST["txtLogradouro"];
    $numero = $_POST["txtNumero"];
    $referencia = $_POST["txtReferencia"];

    /* Faz o update dos dados no Banco com os valores que o usuário quer inserir */
    $conex->executarSQL("UPDATE endereco SET logradouro = '$logradouro', numero = '$numero', referencia = '$referencia' WHERE id_endereco = '$_SESSION[id_endereco]'");

    $conex->fecharConexao();

    unset($_SESSION["id_endereco"]);
    
    /* Faz o redirecionamento */
    header("Location: ../princ_endereco.php");

}else if ($endereco->verificaForm($campos) == true) {

    /* Coleta os dados do formulário */
    $logradouro = $_POST["txtLogradouro"];
    $numero = $_POST["txtNumero"];
    $referencia = $_POST["txtReferencia"];

    

    /* Faz a inserção dos dados no Banco com os valores que o usuário quer inserir */
    $conex->executarSQL("INSERT endereco(logradouro, numero, referencia, id_usuario_fk) VALUES('$logradouro', '$numero', '$referencia', '$codigo');");

    $conex->fecharConexao();
    
    /* Faz o redirecionamento */
    header("Location: ../princ_endereco.php");
}else{
    echo "Não foi possivel executar alguma das modificações";
}


?>
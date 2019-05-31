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
    "txtBairro",
    "txtNumero",
    "txtReferencia",
    "txtCep"
);

/* Abre uma conexão com o Banco de Dados */
if (!$conex->abrirConexao()) {
    echo "Erro de conexão com o Banco de Dados";
} 

if(isset($_SESSION["id_endereco"])){
    /* Coleta os dados do formulário */
    $logradouro = $_POST["txtLogradouro"];
    $numero = $_POST["txtNumero"];
    $bairro = $_POST["txtBairro"];
    $referencia = $_POST["txtReferencia"];
    $cep = $_POST["txtCep"];

    switch ($_SESSION['acao']) {
        case 'alterar':
            /* Faz o update dos dados no Banco com os valores que o usuário quer inserir */
            $conex->executarSQL("UPDATE endereco SET cep = '$cep', logradouro = '$logradouro', bairro = '$bairro', numero = '$numero', referencia = '$referencia' WHERE id_endereco = '$_SESSION[id_endereco]'");
            break;
    
        case 'deletar':
            $conex->executarSQL("DELETE FROM endereco WHERE id_endereco = '$_SESSION[id_endereco]'");
            break;
        default:
            echo "A ação não pode ser feita";
            break;
    }
    
    $conex->fecharConexao();

    unset($_SESSION["id_endereco"]);
    
    /* Faz o redirecionamento */
    header("Location: ../princ_endereco.php");

}else if ($endereco->verificaForm($campos) == true) {

    /* Coleta os dados do formulário */
    $logradouro = $_POST["txtLogradouro"];
    $numero = $_POST["txtNumero"];
    $referencia = $_POST["txtReferencia"];
    $cep = $_POST["txtCep"];
    $bairro = $_POST["txtBairro"];

    /* Faz a inserção dos dados no Banco com os valores que o usuário quer inserir */
    $conex->executarSQL("INSERT endereco(cep, bairro, logradouro, numero, referencia, id_usuario_fk) VALUES('$cep', '$bairro', '$logradouro', '$numero', '$referencia', '$codigo');");

    $conex->fecharConexao();
    
    /* Faz o redirecionamento */
    header("Location: ../princ_endereco.php");
}else{
    echo "Não foi possivel executar alguma das modificações";
}


?>
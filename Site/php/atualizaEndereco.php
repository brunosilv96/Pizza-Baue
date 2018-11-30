<?php
require_once 'lib/bancoDeDados.php';
require_once 'class/Endereco.php';

/* Inicia a sessão */
session_start();

/* Atravez da sessão ativa, coleta o ID do usuário logado */
$codigo = $_SESSION["id_usuario"];

/* Instância do Banco de Dados */
$conex = new BancoDeDados();

/* Cria um Array com os nomes dos campos dos formulário */
$campos = Array(
    "txtLogradouro",
    "txtNumero",
    "txtCidade",
    "txtUf",
    "txtComplemento"
);

/* Cria uma instância na Classe Endereço */
$endereco = new Endereco();

/* Abre uma conexão com o Banco de Dados */
if ($conex->abrirConexao()) {

    /* Faz a busca de algum endereço relacionado ao usuário */
    $conex->executarSQL("SELECT * FROM endereco WHERE id_usuario_fk = '$codigo'");

    /* Coleta os resultados obtidos */
    $resultado = $conex->lerResultados();

    /*Caso tenha retornado algum registro do Banco...

    * Lemabrando que se o usuário já tenha um endereço cadastrado os dados irão aparecer nos campos do formulário, 
    * e a condição abaixo fará a atualização dos dados no Banco
    */
    if (count($resultado) == 1) {

        /* Chama a função que verifica a existencia dos campos, se forem válidos... */
        if ($endereco->verificaForm($campos) == true) {

            /* Coleta os valores do formulário caso os dados precisem ser atualizados */
            $logradouro = $_POST["txtLogradouro"];
            $numero = $_POST["txtNumero"];
            $cidade = $_POST["txtCidade"];
            $uf = $_POST["txtUf"];
            $complemento = $_POST["txtComplemento"];

            /* Faz a atualização dos dados do Banco com os dados que o usuário substituiu */
            $conex->executarSQL("UPDATE endereco SET logradouro = '$logradouro', numero = '$numero', cidade = '$cidade', uf = '$uf', complemento = '$complemento' WHERE id_usuario_fk = '$codigo';");

            /* Faz o redirecionamento */
            header("Location: ../princ_endereco.php?flag=Cadastro atualizado com sucesso!");
        } else {
            echo "Erro ao atualizar endereço no Banco de Dados";
        }

        /* Caso o usuário não possua endereço cadastrado no Banco de Dados */
    } else {

        /* Verifica a existencia dos campos do formulário */
        if ($endereco->verificaForm($campos) == true) {

            /* Coleta os dados do formulário */
            $logradouro = $_POST["txtLogradouro"];
            $numero = $_POST["txtNumero"];
            $cidade = $_POST["txtCidade"];
            $uf = $_POST["txtUf"];
            $complemento = $_POST["txtComplemento"];

            /* Faz a inserção dos dados no Banco com os valores que o usuário quer inserir */
            $conex->executarSQL("INSERT endereco(logradouro, numero, cidade, uf, complemento, id_usuario_fk) VALUES('$logradouro', '$numero', '$cidade', '$uf', '$complemento', '$codigo');");
            
            /* Faz o redirecionamento */
            header("Location: ../princ_endereco.php?flag=Cadastro inserido com sucesso!");
        } 
        /* Se caso a existência dos campos não forem válidas */
        else {
            echo "Erro ao adicionar endereço no Banco de Dados";
        }
    }
    
/* Caso não seja possivel abrir uma conexão com o Banco de Dados */
} else {
    echo "Erro de conexão com o Banco de Dados";
}

?>
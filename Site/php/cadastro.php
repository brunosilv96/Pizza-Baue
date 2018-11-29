<?php
require_once 'class/Usuario.php';
require_once 'lib/bancoDeDados.php';

/* Cria um objeto do tipo Usuario */
    $user = new Usuario();
    
/* Cria um Array com os nomes dos campos dos formulários */
$campos = Array(
    "txtEmail",
    "txtCpf",
    "senha1",
    "senha2"
);

/* Chama a função que faz a veriricação dos campos no formulário */
if ($user->verificaForm($campos) == true) {

    /* Seta os valores para a classe */
    $user->setNome($_POST["txtNome"]);
    $user->setEmail($_POST["txtEmail"]);
    $user->setCpf($_POST["txtCpf"]);
    $user->setSenha($_POST["senha1"]);

    /* Inicia o processo de adição dos dados no Banco */
    try {
        /* Cria um objeto do tipo Banco de Dados */
        $conex = new BancoDeDados();

        if ($conex->abrirConexao()) {
            /* Atribuindo os valores da classe a variaveis */
            $nome = $user->getNome();
            $email = $user->getEmail();
            $cpf = $user->getCpf();
            $senha = $user->getSenha();

            /* Comando que irá para o Banco de Dados */

            $sql = "INSERT usuario(nome, email, cpf, senha) VALUES ('$nome', '$email', '$cpf', MD5('$senha'));";

            $conex->executarSQL($sql);

            /* Se a inserção for um sucesso, redirciona para a página do usuario */
            header("Location: ../index.html#modal-login");
            
        } else {
            /* Se caso ocorrer algum erro na hora da adição de registro */
            header("Location: exibeMsg.php?txtresultado=Erro de conexão com o Banco");
        }

        $conex->fecharConexao();

    } catch (Exception $e) {
        header("Location: exibeMsg.php?txtresultado=Erro de conexão com o Banco '. $e'");
    }
} else {
    echo "Erro nos campos do formulário";
}


?>
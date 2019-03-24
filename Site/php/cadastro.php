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

            $conex->executarSQL("SELECT email FROM usuario WHERE email = '$email';");

            $resultado = $conex->lerResultados();

            if(count($resultado) > 0){
                header("Location: ../index.php");
            }else{
                /* Comando que irá para o Banco de Dados */
                $conex->executarSQL("INSERT INTO usuario(nome, email, cpf, senha, funcionario) VALUES ('$nome', '$email', '$cpf', MD5('$senha'), 'Nao');");

                /* Se a inserção for um sucesso, redirciona para a página do usuario */
                header("Location: ../index.php#modal-login");
            }
        } else {
            /* Se caso ocorrer algum erro na hora da adição de registro */
            header("Location: exibeMsg.php");
        }

        $conex->fecharConexao();

    } catch (Exception $e) {
        header("Location: exibeMsg.php?flag=Erro de conexão com o Banco '. $e'");
    }
} else {
    echo "Erro nos campos do formulário";
}


?>
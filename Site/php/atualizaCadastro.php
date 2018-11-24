<?php
require_once 'class/Usuario.php';
require_once 'lib/bancoDeDados.php';

/* Instância um novo objeto do tipo Usuário */
$user = new Usuario();

/* Indica o nome dos campos para atualizar */
$campos = Array(
    "txtNome",
    "txtEmail",
    "txtSenha1",
    "txtSenha2"
);

/* Verifica se os campos estão válidos */
if ($user->verificaForm($campos) == true) {

    /* Seta os valores para a classe */
    $user->setNome($_POST["txtNome"]);
    $user->setEmail($_POST["txtEmail"]);
    $user->setCpf($_POST["txtCpf"]);
    $user->setSenha($_POST["senha1"]);
    
    /* Seta os valores da classes para váriaveis */
    $nome = $user->getNome();
    $email = $user->getEmail();
    $cpf = $user->getCpf();
    $senha = $user->getSenha();
    
    try {
        
        /*
         * Só será possivel atualizar quando tiver uma sessão ativa 
         * 
         * */
        
    } catch (Exception $e) {}
} else {
    echo "Erro nos campos do formulário";
}
?>
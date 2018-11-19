<?php
/* Faz a requisição da Biblioteca do Banco de Dados */
require_once 'lib/bancoDeDados.php';
require_once 'class/Usuario.php';

print_r ($_POST);

/* Faz a validação dos campos em $_POST */
if(isset($_POST["txtNome"]) == true){
    if(isset($_POST["txtEmail"]) == true){
        if(isset($_POST["txtCpf"]) == true){
            if(isset($_POST["txtSenha"]) == true){
                /* Faz a instancia da Classe Usuario */
                $user = new Usuario();

                $user->setNome(isset($_POST["txtNome"]));
                $user->setEmail(isset($_POST["txtEmail"]));
                $user->setCpf(isset($_POST["txtCpf"]));
                $user->setSenha(isset($_POST["txtSenha"]));
                
                print_r($user->getNome());
                print_r($user->getEmail());
                print_r($user->getCpf());
                print_r($user->getSenha());
            }
        }
    }
}else{
    echo "Falha no formulário";
}

?>
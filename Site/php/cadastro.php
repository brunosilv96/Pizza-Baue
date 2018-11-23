<?php
/* Faz a requisição da Biblioteca do Banco de Dados */
require_once 'lib/bancoDeDados.php';
require_once 'class/Usuario.php';


/* Faz a 'validação' dos campos em $_POST */
if(isset($_POST["txtNome"]) == true){
    if(isset($_POST["txtEmail"]) == true){
        if(isset($_POST["txtCpf"]) == true){
            if(isset($_POST["senha1"]) == true){
                if(isset($_POST["senha2"]) == true){

                    /* Atribui os valores das senhas para as variaveis */
                    $senha1 = $_POST["senha1"];
                    $senha2 = $_POST["senha2"];

                    /* Faz a comparação das senhas */
                    if ($senha1 != $senha2) {
                        /* 
                            * Se as senhas forem diferentes, redireciona de volta para a index.html
                              parando a execução do PHP
                        */
                        echo("As senhas não são iguais");
                        header("Location: ./index.html");
                        exit();
                    }
                    
                    /* Todo processo vai ser colocado nesta estrutura abaixo (dentro do 'try') */
                    try {
                        /* Faz a instancia da Classe Usuario */
                        $user = new z

                        /* Atribui os Valores ultilizando a instância */
                        $user->setNome($_POST["txtNome"]);
                        $user->setEmail($_POST["txtEmail"]);
                        $user->setCpf($_POST["txtCpf"]);
                        $user->setSenha($senha1);
                        
                    } catch (Exception $e) {
                        /* 
                            * Aqui é pra onde o script segue caso aconteça algum erro no bloco 'try'
                            * A variavel '$e' armazena o erro
                        */
                        echo("ERRO: ".$e);
                    }
                    
                }else{
                    echo "Falha no campo CONFIRME SUA SENHA";
                    exit(); /* O 'exit()' garante que sairá da execução */
                }
            }else{
                echo "Falha no campo SENHA";
                exit();
            }
        }else{
            echo "Falha no campo CPF";
            exit();
        }
    }else{
        echo "Falha no campo E-MAIL";
        exit();
    }
}else{
    echo "Falha no campo NOME";
    exit();
}
?>
<?php
/* Faz a requisição da Biblioteca do Banco de Dados */
require_once 'class/Usuario.php';
require_once 'lib/bancoDeDados.php';

/* Faz a 'validação' dos campos em $_POST */
$campos = Array("txtEmail", "txtCpf", "senha1", "senha2");

if(verificaForm($campos) == true){
    /* Cria um objeto do tipo Usuario */
    $user = new Usuario();
    
    /* Seta os valores para a classe */
    $user->setNome($_POST["txtNome"]);
    $user->setEmail($_POST["txtEmail"]);
    $user->setCpf($_POST["txtCpf"]);
    $user->setSenha($_POST["senha1"]);
    
    /* Inicia o processo de adição dos dados no Banco */
    try {
        /* Cria um objeto do tipo Banco de Dados */
        $conex = new BancoDeDados();
        
                
        if ($conex->abrirConexao()){ 
           /*Atribuindo os valores da classe a variaveis*/ 
           $nome = $user->getNome();
           $email = $user->getEmail();
           $cpf = $user->getCpf();
           $senha = $user->getSenha();
           
           /*inserindo os dados no banco*/
           $conex-> executarSql("INSERT usuario(nome, email, cpf, senha) VALUES ('$nome', '$email', '$cpf', MD5('$senha'));");
           

           header("Location: exibeMsg.php?txtresultado=Sucesso");

        }else{
            echo "Erro de conexão com o Banco de Dados";
        }
        
    } catch (Exception $e) {
        echo "Erro ao salvar os dados no Banco " . $e;
    }
    
}else{
    echo "Erro nos campos do formulário";
}


/* Função para fazaer a validação dos campos do formulário */
function verificaForm(Array $campos){
    foreach($campos as $itens){
        if (isset($_POST[$itens]) == true) {
            return true; 
        } else {
            return false;
        }
    }
}

?>
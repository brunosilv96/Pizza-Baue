<?php
/* Faz a requisição da Biblioteca do Banco de Dados */
require_once 'class/Usuario.php';
require_once 'lib/bancoDeDados.php';



/* Faz a 'validação' dos campos em $_POST */
$campos = Array("txtEmail", "txtCpf", "senha1", "senha2");

if(verificaForm($campos) == true){
    
    $user = new Usuario();
    
    $user->setNome($_POST["txtNome"]);
    $user->setNome($_POST["txtEmail"]);
    $user->setNome($_POST["txtCpf"]);
    $user->setNome($_POST["senha1"]);
    
    try {
        $conex = new BancoDeDados();
        
        $conex->abrirConexao();
        
        
    } catch (Exception $e) {
        
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
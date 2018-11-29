<?php 
require_once 'class/Usuario.php';
require_once 'lib/bancoDeDados.php';

/* Abre uma Sessão para o Usuário */
session_start ();

/* Informo os campos para validação */
$campos = Array("txtUser", "txtSenha");

/* Atribui os valores as variáveis */
$user = $_POST["txtUser"];
$senha = $_POST["txtSenha"];

/* Codifica a senha para comparar com o Banco de Dados */
$codificada = MD5($senha);

/* Se a válidação dos campos forem válida, então... */
if(verificaForm($campos) == true){
    
    /* Busca dos Dados do Usuário no Banco de Dados */
    try {
        $conex = new BancoDeDados();
        
        if ($conex->abrirConexao()) {
            $sql = "SELECT * FROM usuario WHERE email = '$user' AND senha = '$codificada';";
            
            $conex->ExecutarSQL($sql);
            
            $resultado = $conex->lerResultados();
            
            if(count($resultado) > 0){
                $_SESSION["id_usuario"] = $resultado[0]["id_usuario"];
                header("Location: ../principal.php");
            }else{
                header("Location: ../index.html");
            }
        }
        
        desconectar ();
        
    } catch (Exception $e) {
        echo "Falha ao buscar usuário no Banco de Dados <br>".$e;
    }
    
}

function verificaForm(Array $campos){
    foreach($campos as $itens){
        if (isset($_POST[$itens]) == true) {
            return true;
        } else {
            echo "O campo não existe: ". $campos;
            break;
            return false;
        }
    }
}
?>
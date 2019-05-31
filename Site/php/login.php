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
        
        /* Abre a conexão com o Banco de Dados */
        if ($conex->abrirConexao()) {

            /* Cria a string de busca com o Banco de Dados */
            $sql = "SELECT * FROM usuario WHERE email = '$user' AND senha = '$codificada';";
            
            /* Manda atravez da instância a string de conexão para o Banco de Dados */
            $conex->ExecutarSQL($sql);
            
            /* Coleta os resultados obtidos */
            $resultado = $conex->lerResultados();
            
            /* É verificado se retornou algum registro, se sim, atribua a $_SESSION e encaminhe */
            if(count($resultado) > 0){
                $_SESSION["id_usuario"] = $resultado[0]["id_usuario"];
                $funcionario = $resultado[0]["funcionario"];

                if ($funcionario == "Sim"){
                    header("Location: ../administrador.php");
                }else {
                    header("Location: ../principal.php");
                }
            }
            /* Se não, somente encaminhe */
            else{
                header("Location: ../index.php");
            }
        }
        
        /* Desconecta do Banco de Dados */
        desconectar ();
    
    /* Quando algum erro no bloco "try" acontece, redireciona para este bloco */
    } catch (Exception $e) {
        echo "Falha ao buscar usuário no Banco de Dados: <br>".$e;
    }
    
}

/* Função que faz a verificação da existência dos campos do formulário */
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
<?php
require_once 'class/Usuario.php';
require_once 'lib/bancoDeDados.php';

session_start();

$codigo = $_SESSION["id_usuario"];

/* Instância um novo objeto do tipo Usuário */
$user = new Usuario();
$conex = new bancoDeDados();

/* Indica o nome dos campos para atualizar */
$campos = Array(
    "txtNome",
    "txtEmail",
    "txtCpf",
    "txtSenha1",
    "txtSenha2"
);

/* Verifica se os campos estão válidos */
if ($user->verificaForm($campos) == true) {

    /* Seta os valores para a classe */
    $user->setNome($_POST["txtNome"]);
    $user->setEmail($_POST["txtEmail"]);
    $user->setCpf($_POST["txtCpf"]);
    $user->setSenha($_POST["txtSenha1"]);

    $nomeDoArquivo = rand () . microtime ( true ) . "." . explode ( ".", $_FILES["fileImagem"]["name"]);
    $caminhoDoArquivo = $_FILES ["fileImagem"]["tmp_name"];
    $destino = "../images/user/$nomeDoArquivo";
    $resultado = move_uploaded_file ( $caminhoDoArquivo, $destino );

    print_r ($_FILES);
    
    /* Seta os valores da classes para váriaveis */
    $nome = $user->getNome();
    $email = $user->getEmail();
    $cpf = $user->getCpf();
    $senha = $user->getSenha();
    
    try {
        $conex->abrirConexao();

        $conex->executarSQL("SELECT * FROM imagem FROM id_usuario_fk = '$codigo'");

        $resultado = $conex->lerResultados();

        if(count($resultado) == 1){
            $sql = "UPDATE imagem SET nome = '$nomeDoArquivo', id_usuario_fk = '$codigo'";
            $conex->executarSQL($sql);
        }else{
            $sql = "INSERT INTO imagem (nome, id_usuario_fk) values	('$nomeDoArquivo', '$codigo')";
            $conex->executarSQL($sql);
        }
        $conex->fecharConexao();

        if ($conex->abrirConexao()) {

            /* Faz a busca de algum endereço relacionado ao usuário */
            $conex->executarSQL("SELECT * FROM usuario WHERE id_usuario_fk = '$codigo'");
        
            /* Coleta os resultados obtidos */
            $resultado = $conex->lerResultados();
        
            /*Caso tenha retornado algum registro do Banco...
        
            * Lemabrando que se o usuário já tenha um cadastro feito os dados irão aparecer nos campos do formulário, 
            * e a condição abaixo fará a atualização dos dados no Banco
            */
            if (count($resultado) == 1) {
        
                /* Chama a função que verifica a existencia dos campos, se forem válidos... */
                if ($user->verificaForm($campos) == true) {
        
                    /* Coleta os valores do formulário caso os dados precisem ser atualizados */
                    $nome = $user->getNome();
                    $email = $user->getEmail();
                    $cpf = $user->getCpf();
                    $senha = $user->getSenha();
        
                    /* Faz a atualização dos dados do Banco com os dados que o usuário substituiu */
                    $conex->executarSQL("UPDATE usuario SET nome = '$nome', email = '$email', cpf = '$cpf', senha = '$senha' WHERE id_usuario_fk = '$codigo';");
        
                    /* Faz o redirecionamento */
                    header("Location: ../princ_cadastro.php?flag=Cadastro atualizado com sucesso!");

                    $conex->fecharConexao();
                } else {
                    echo "Erro ao atualizar endereço no Banco de Dados";
                }
        
                /* Caso o usuário não possua endereço cadastrado no Banco de Dados */
            } else {
                echo "Erro ao identificar o usuário";
            }
            
        /* Caso não seja possivel abrir uma conexão com o Banco de Dados */
        } else {
            echo "Erro de conexão com o Banco de Dados";
        }
        
    } catch (Exception $e) {}
} else {
    echo "Erro nos campos do formulário";
}
?>
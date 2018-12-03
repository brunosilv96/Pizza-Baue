<?php
require_once 'class/Usuario.php';
require_once 'lib/bancoDeDados.php';

session_start();

$codigo = $_SESSION["id_usuario"];

/* Instância um novo objeto do tipo Usuário */
$conex = new bancoDeDados();
$user = new Usuario();

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
    $nome = $_POST["txtNome"];
    $email = $_POST["txtEmail"];
    $cpf = $_POST["txtCpf"];
    $senha = $_POST["txtSenha1"];
    $senha2 = $_POST["txtSenha2"];
    
    if ($senha != $senha2 || ($senha == "" && $senha2 == "") || ($senha == "" || $senha2 == "")) {
        header("Location: ../princ_cadastro.php?flag=As senhas são diferentes!");
        echo "As senhas são diferentes";
    } else {

        try {
            if ($conex->abrirConexao()) {
                $conex->executarSQL("UPDATE usuario SET nome = '$nome', email = '$email', cpf = '$cpf', senha = MD5('$senha') WHERE id_usuario = '$codigo';");

                header("Location: ../princ_cadastro.php?flag=Cadastro Atualizado!");
            } else {
                echo "Falha ao atualizar o cadastro do usuário!";
            }
        } catch (Exception $e) {
            echo "Falha na atualização!<br>" . $e;
        }

        $conex->fecharConexao();
    }
}

?>
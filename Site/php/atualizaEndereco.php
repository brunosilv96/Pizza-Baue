<?php
require_once 'lib/bancoDeDados.php';
require_once 'class/Endereco.php';

session_start();

$codigo = $_SESSION["id_usuario"];

$conex = new BancoDeDados();

$campos = Array(
    "txtLogradouro",
    "txtNumero",
    "txtEstado",
    "txtUf",
    "txtComplemento"
);

$endereco = new Endereco();

if ($conex->abrirConexao()) {

    $conex->executarSQL("SELECT * FROM endereco WHERE id_usuario_fk = '$codigo'");

    $resultado = $conex->lerResultados();

    if (count($resultado) == 1) {
        if ($endereco->verificaForm($campos) == true) {

            $logradouro = $_POST["txtLogradouro"];
            $numero = $_POST["txtNumero"];
            $estado = $_POST["txtEstado"];
            $uf = $_POST["txtUf"];
            $complemento = $_POST["txtComplemento"];

            $conex->executarSQL("UPDATE endereco SET logradouro = '$logradouro', numero = '$numero', estado = '$estado', uf = '$uf', complemento = '$complemento' WHERE id_usuario_fk = '$codigo';");

            header("Location: ../princ_endereco.php");
        } else {
            echo "Erro ao atualizar endereço no Banco de Dados";
        }
    } else {
        if ($endereco->verificaForm($campos) == true) {

            $logradouro = $_POST["txtLogradouro"];
            $numero = $_POST["txtNumero"];
            $estado = $_POST["txtEstado"];
            $uf = $_POST["txtUf"];
            $complemento = $_POST["txtComplemento"];

            $conex->executarSQL("INSERT endereco(logradouro, numero, estado, uf, complemento, id_usuario_fk) VALUES('$logradouro', '$numero', '$estado', '$uf', '$complemento', '$codigo');");

            header("Location: ../princ_endereco.php");
        } else {
            echo "Erro ao adicionar endereço no Banco de Dados";
        }
    }
} else {
    echo "Erro de conexão com o Banco de Dados";
}

?>
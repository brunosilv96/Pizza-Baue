<?php 
require_once "lib/bancoDeDados.php";

$oCon = new BancoDeDados();

if(!$oCon->abrirConexao()){
    echo "Erro de Conexão com Banco de Dados";
}

if(isset($_POST["chkFuncionario"])){
    $oCon->executarSQL("INSERT INTO usuario(nome, email, cpf, senha, funcionario) VALUE('$_POST[txtNome]', '$_POST[txtEmail]', '$_POST[txtCpf]', MD5('$_POST[txtSenha]'), 'Sim')");
    echo "Funcionário cadastrado com sucesso!!";

}else {
    $oCon->executarSQL("INSERT INTO usuario(nome, email, cpf, senha, funcionario) VALUE('$_POST[txtNome]', '$_POST[txtEmail]', '$_POST[txtCpf]', MD5('$_POST[txtSenha]'), 'Nao');");
    echo "Cliente cadastrado com sucesso!!";
}

$oCon->fecharConexao();

header("Location: ../index.php");



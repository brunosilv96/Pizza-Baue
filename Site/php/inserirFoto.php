<?php
/*  
 * Necessário ter uma sessão ativa para adicionar a foto
 * 
 * */

require_once 'lib/bancoDeDados.php';

if (! conectar()) {
    echo "Falha ao atualizar o banco de dados!";
    return;
}

session_start();

if (! isset($_SESSION["cod"])) {
    header("Location: index.php");
    return;
}

$codDono = $_SESSION["cod"];

/*
 * Script que deve ser inserido quando for subir a imagem para o Banco de Dados
 *
 */

$nomeDoArquivo = rand() . microtime(true) . "." . end(explode(".", $_FILES["arquivo"]["name"]));

$caminhoDoArquivo = $_FILES["arquivo"]["tmp_name"];

$descricao = $_POST["descricao"];

$visibilidade = $_POST["visibilidade"] == "on" ? 1 : 0;

$destino = "./images/$nomeDoArquivo";

$resultado = move_uploaded_file($caminhoDoArquivo, $destino);

if ($resultado) {
    $sql = "insert into Foto (nome, descricao, visibilidade, cod_canal) values	('$nomeDoArquivo','$descricao',$visibilidade,'$codDono')";
    executarSQL($sql);
}
?>
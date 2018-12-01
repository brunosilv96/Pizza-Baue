<?php
require_once 'lib/bancoDeDados.php';

session_start();

$codigo = $_SESSION["id_usuario"];

$nomeDoArquivo = $_FILES["fileImagem"]["name"];

$caminhoDoArquivo = $_FILES["fileImagem"]["tmp_name"];

$destino = "../images/user/$nomeDoArquivo";

$resultado = move_uploaded_file($caminhoDoArquivo, $destino);

$conex = new BancoDeDados();

if ($resultado) {
    if($conex->abrirConexao()){

    $conex->executarSQL("SELECT * FROM imagem WHERE id_usuario_fk = '$codigo';");
    $resultado = $conex->lerResultados();

    if(count($resultado) > 0){
        $conex->executarSQL("UPDATE imagem SET nome = '$nomeDoArquivo' WHERE id_usuario_fk = '$codigo';");
        header("Location: ../princ_insereFoto.php?flag=Imagem de perfil atualizada!");
    }else{
        $conex->executarSQL("INSERT INTO imagem(nome, id_usuario_fk) VALUE('$nomeDoArquivo', '$codigo');");
        header("Location: ../princ_insereFoto.php?flag=Imagem de perfil adicionada!");
    }

    $conex->fecharConexao();
}
}else{
    header("Location: ../princ_insereFoto.php?flag=Selecione uma imagem antes de inserir!");
}

?>
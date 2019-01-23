<?php
/* Importação da Classe referente ao Banco de Dados */
require_once 'lib/bancoDeDados.php';

/* Inicia a sessão nesta página */
session_start();

/* Recebe e o codigo referente ao usuário */
$codigo = $_SESSION["id_usuario"];

/* Nomeia a imagem de acordo com as informáções do arquivo */
$nomeDoArquivo = $_FILES["fileImagem"]["name"];

/* Indica o caminho da imagem de acordo com as informaçãoes do arquivo */
$caminhoDoArquivo = $_FILES["fileImagem"]["tmp_name"];

/* Detalha o caminho correto onde a imagem irá ser armagenada */
$destino = "../images/user/$nomeDoArquivo";

/* Faz a ação de mover o arquivo de arcordo com as configurações passadas */
$resultado = move_uploaded_file($caminhoDoArquivo, $destino);

/* Cria uma nova instância de acesso ao Banco */
$conex = new BancoDeDados();

/* Procedimento de armazenagem da imagem de usuário no Banco de Dados */
if ($resultado) {
    if($conex->abrirConexao()){

    /* Faz uma consulta para saber se o usuário já possui ou não a imagem de perfil */
    $conex->executarSQL("SELECT * FROM imagem WHERE id_usuario_fk = '$codigo';");
    $resultado = $conex->lerResultados();
    
    /* Caso já tenha, é feito a atualização, se não é feita a inserção */
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
<?php 
/* Faz o inicio da sessão */
session_start();

/* Caso tenha uma sessão de usuário ativa... */
if(isset($_SESSION["id_usuario"])){

    /* Faz a destruição da sessão do usuário */
    session_destroy();

    /* Faz o redirecionamento */
    header("Location: ../index.php");
}
/* Caso a sessão do usuário não exista */
else{
    echo "Não existe sessão ativa";
}
?>
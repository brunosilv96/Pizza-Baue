<?php
/* Faz a requisição da Biblioteca do Banco de Dados */
require_once 'lib/bancoDeDados.php';
require_once 'class/usuario.php';

$user1 = new Usuario();

$user1->setNome("Bruno");

echo ($user1->getNome());

?>
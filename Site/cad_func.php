<?php 
require_once "php/lib/bancoDeDados.php";

$oCon = new BancoDeDados();

if(!$oCon->abrirConexao()){
    echo "Erro de Conexão com Banco de Dados";
}

if(isset($_POST["chkFuncionario"])){
    $oCon->executarSQL("INSERT INTO usuario(nome, email, cpf, senha, funcionario) VALUE('$_POST[txtNome]', '$_POST[txtEmail]', '$_POST[txtCpf]', '$_POST[txtSenha]', '$_POST[chkFuncionario]')");
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Funcionários</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<body>
    <style>
        body{
        width: 50%;
        margin: auto; 
    }

    form{
        width: 100%;
    }

    input, label{
        width: 100%;
        height: 30px;
        margin-top: 5px; 
        float: left;
    }

    img{
        width: 50%;
        height: 300px;
        margin-top: 20px;
        image-resolution: 100%;
    }
    </style>

    <form action="cad_func.php" method="POST">
        <label>NOME:</label>
        <input type="text" name="txtNome" REQUIRED>
        <label>E-MAIL:</label>
        <input type="text" name="txtEmail" REQUIRED>
        <label>CPF:</label>
        <input type="text" name="txtCpf" REQUIRED>
        <label>SENHA:</label>
        <input type="password" name="txtSenha" REQUIRED>
        <label>FUNCIONÁRIO?</label>
        <input type="checkbox" name="chkFuncionario" value="1">
        <label>INSERIR IMAGEM:</label>
        <img id="imgFoto">
        <!--Evento quando é alterado alguma propriedade-->
        <input type="file" name="txtArquivo" onchange="fmCarrega(this)"/>
        <input type="submit" value="Enviar"/>
    </form>
</body>
<script>
function fmCarrega(arquivo){
        if(arquivo.files && arquivo.files[0]){
            let imagem = new FileReader();

            imagem.onload = function(foto){
                imgFoto.src = foto.target.result;
            }

            imagem.readAsDataURL(arquivo.files[0]);
        }
    }
</script>
</html>
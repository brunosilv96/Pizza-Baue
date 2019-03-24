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

    <form action="Site/php/cadastroAdm.php" method="POST" >
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

        <input type="submit" value="Enviar"/>
    </form>
    
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Funcionários</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/if_global.css">
	<link rel="stylesheet" href="css/if_cadastro.css">
	<link rel="stylesheet" href="css/global.css">
</head>
<body>
<div class="container-conteudo">
		<h3>Cadastrar Usuários</h3>
    <form action="Site/php/cadastroAdm.php" method="POST" >


       <table>
				<tr>
					<td class="lb"><label>Nome:</label></td>
                </tr>
                <tr>
					<td class="txt"><input type="text"  class="input-cadastro" name="txtNome"></td>
				</tr>
       
                <tr>
					<td class="lb"><label>E-mail:</label></td>
				</tr>
                <tr>
					<td class="txt"><input type="text"  class="input-cadastro" name="txtEmail"></td>
				</tr>

                <tr>
					<td class="lb"><label>CPf:</label></td>
                </tr>
                <tr>
					<td class="txt"><input type="text"  class="input-cadastro" name="txtCpf"></td>
				</tr>    
       
                <tr>
					<td class="lb"><label>Senha:</label></td>
                </tr>
                <tr>
					<td class="txt"><input type="password"  class="input-cadastro" name="txtSenha"></td>
				</tr>
        
                <tr>
					<td class="lb"><label>Funcionario?</label></td>
                </tr>
                <tr>
					<td class="txt"><input type="checkbox" name="chkFuncionario" value="1"  class="input-cadastro"></td>
				</tr>
        
</table>
                <input type="submit" name="btnSalvar" class="btn-cadastro" value="Salvar">


    </form>
</div>
</body>

</html>
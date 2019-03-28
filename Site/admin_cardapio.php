<html>

<head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
                integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
                crossorigin="anonymous">
        <link rel="stylesheet" href="css/if_cadastro.css">
        <link rel="stylesheet" href="css/if_global.css">
        <link rel="stylesheet" href="css/global.css">
</head>

<body>
        <div class="container-conteudo">
                <h3>Inserir Pizza</h3>
                <form action="php/cadastraCardapio.php" method="post" id="telefone" enctype="multipart/form-data" onsubmit="return verificaEnde(event)">
                        <table>
                                <tr>
                                        <td class="lb"><label>Sabor:</label></td>
                                </tr>
                                <tr>
                                        <td class="txt"><input type="text" id="log" class="input-cadastro" name="txtSabor"></td>
                                </tr>
                                <tr>
                                        <td class="lb"><label>Descrição:</label></td>
                                </tr>
                                <tr>
                                        <td class="txt"><textarea name="txtDescricao"></textarea></td>
                                </tr>
                                <tr>
                                        <td class="lb"><label>Preço:</label></td>
                                </tr>
                                <tr>
                                        <td class="txt"><input type="text" id="log" class="input-cadastro" name="txtPreco"></td>
                                </tr>
                                <tr>
                                        <td class="lb"><label>Imagem da Pizza:</label></td>
                                </tr>
                                <tr>
                                        <td class="txt"><input type="file" id="log" class="input-cadastro" name="imgCardapio"></td>
                                </tr>
                        </table>
                        <input type="submit" name="btnSalvar" class="btn-cadastro">
                </form>
        </div>
</body>
<!-- <script src="js/global.js"></script> -->
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Montagem da Pizza</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/montagem.css">

</head>
<body>
<!--container principal-->
<section class="sessao1">
	<!--Primeira etapa-->
    <div id="opcao1" class="opcoes"><h1>Escolha seu molho</h1>
        <br><br>
        
        <label for="pic1"><img src="images/montagem/pic1.png" class="foto" alt="">
        <input type="radio" name="escolha" id="pic1" value="molho1">
        <br><br>
        <label for="pic2"><img src="images/montagem/pic2.jpg" class="foto" alt="">
        <input type="radio" name="escolha" id="pic2" value="molho2">

        
        <br><br><button type="submit" id="btn1" onclick="mostrar();visualizaDiv(2);">Proximo</button>
    </div>
<!--Segunda etapa-->
    <div id="opcao2" class="opcoes"><h2>Escolha seus Ingredientes</h2><br>
        (Máximo 5 ingredientes) 

        <form>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Parmesão</span> </label>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Mussarela</span> </label>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Gorgonzola</span> </label>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Catupiry</span> </label>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Mussarela de Búfala</span> </label>
            <br>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Peito de Peru</span> </label>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Lombo</span> </label>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Bacon</span> </label>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Calabresa</span> </label>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Pepperoni</span> </label>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Presunto</span> </label>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Atum</span> </label>
            <label><input type="checkbox" name="radValor" onclick="fnIngredientes(this)" /> <span>Frango</span> </label>
        </form>

    	<button id="btn2" onclick="visualizaDiv(3)">Proximo</button>
    	<button id="btn2" onclick="visualizaDiv(1)">voltar</button>
    </div>
<!--Terceira etapa-->
    <div id="opcao3" class="opcoes">Passo 3
        <button id="btn3" onclick="visualizaDiv(4)">Proximo</button>
        <button id="btn3" onclick="visualizaDiv(2)">voltar</button>
    </div>
<!--Quarta etapa-->
    <div id="opcao4" class="opcoes">Passo 4
        <button id="btn3" onclick="visualizaDiv(3)">voltar</button>
    </div>
<!--Tela de inicio-->
    <button id="btn1" class="botao" onclick="visualizaDiv(1)">Monte sua pizza</button>
</section>

<!--Container de vizualização -->
<section class="sessao2">
    <div class="previa">
        Suas Escolhas:<br>
        <br><span class="view-mensagem"></span>
    
    </div>

	<div class="calcula">Calculadora
        <br><br>
        <div>
            Valor da Unidade <br>R$<label id="din"> 25.50</label>
        </div>

        <br><br>

        <select name="conta" onchange="mult()">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="9">8</option>
            <option value="9">9</option>
            <option value="10">10</option>		
        </select>

        <br><br>
        <div>
            <label id="result"></label>
        </div>
</section>


</body>
<script src="js/montagem.js"></script>
</html>
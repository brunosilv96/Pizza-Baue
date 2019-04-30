/* Function esconder div */
function visualizaDiv (div) {
//Especifique quantas divs serão utilizadas no total:
var divTotal = 4;

var objDiv = document.getElementById("opcao"+div);  

//Ocultando todas as divs que poderiam estar visíveis:
for (var i=1; i<=divTotal; i++) {
    var objDivOcultar = document.getElementById("opcao"+i);
    objDivOcultar.style.display = "none";
}

//Tornado visível apenas a div com o parâmetro passado pelo evento:
objDiv.style.display = 'block';

if(input[name='escolha'].checked.length){
    alert('Por favor, selecione o Tipo de Molho.');
    return false;
    }
return true;
}

/* Function calcula */
function mult(){

    total = document.getElementsByName('conta')[0].value * document.getElementById('din').innerText;

    document.getElementById("result").innerHTML = total;

}

//Botão de radio
var radio = document.querySelector(".view-mensagem");
function mostrar() {
    var vetorescolha, mensagem;
    vetorescolha = document.getElementsByName("escolha");

    if (vetorescolha[0].checked)
        mensagem = "Molho 1 selecionado";
    else if (vetorescolha[1].checked)
        mensagem = "Molho 2 selecionado";
    else if(!vetorescolha[0] || vetorescolha[2].checked)
        alert ("Nenhum molho selecionado");
        radio.textContent = mensagem;
}

//Função Ingredientes
function fnIngredientes(oObjeto)
{
	let oSelecao = document.getElementsByName('radValor');
	let nCont, nAux = 0;

	for (nCont = 0; nCont < oSelecao.length; nCont++)
		if (oSelecao[nCont].checked)
			nAux++;

	if (nAux > 5)
	{
		nCont=0;
		while (!oSelecao[nCont].checked || oSelecao[nCont]==oObjeto)
			nCont++
		oSelecao[nCont].checked=false;
	}
}	


/* Function esconder div */
function visualizaDiv (div) {
    //Especifique quantas divs serão utilizadas no total:
    var divTotal = 5;
    
    var objDiv = document.getElementById("etapa"+div);  
    
    //Ocultando todas as divs que poderiam estar visíveis:
    for (var i=1; i<=divTotal; i++) {
        var objDivOcultar = document.getElementById("etapa"+i);
        objDivOcultar.style.display = "none";
    }
    
    //Tornado visível apenas a div com o parâmetro passado pelo evento:
    objDiv.style.display = "block";
}

function exibeInicio(div){
    let altera = document.getElementById('inicial'+div);

    altera.style.display = "block";

}

/* VALIDANDO RADIO - ETAPDA 1 */

let msg = document.querySelector(".view-mensagem");
function validaRadio(div) {

    /* Guarda os resultados dentro da Váriavel*/
    vetor = Array.from(document.getElementsByName('massa'));

    /* Filtra os resultados da Váriavel*/ 
    filtraV = vetor.filter(function(posicao) {return posicao.checked});
    let escolha = filtraV;
    
    if(filtraV.length == 0){
            alert('Por favor, selecione uma Massa.');
            return false;
    }
    visualizaDiv(div);
    msg.textContent = escolha;
    return false;
}


/* VALIDANDO Radio - ETAPA 2 */
function validaRadio2(div) {

    /* Guarda os resultados dentro da Váriavel*/
    vetorM = Array.from(document.getElementsByName('molhos'));

    /* Filtra os resultados da Váriavel*/ 
    filtraM = vetorM.filter(function(posicao) {return posicao.checked});
    
    if(filtraM.length == 0){
            alert('Por favor, selecione um Molho.');
            return false;
    }
    visualizaDiv(div);
    msg.textContent = filtraM;
    return false;
}


/* VALIDANDO - ETAPA 3 */

//Função Ingredientes
function fnIngredientes(oObjeto){
    
	let oSelecao = document.getElementsByName('ingre');
	let nCont, nAux = 0;

	for (nCont = 0; nCont < oSelecao.length; nCont++)
		if (oSelecao[nCont].checked)
			nAux++;

	if (nAux > 4)
	{
		nCont=0;
		while (!oSelecao[nCont].checked || oSelecao[nCont]==oObjeto)
			nCont++
		oSelecao[nCont].checked=false;
	}
}	


/* VALIDANDO - ETAPA 4 */

//Função Complementos
function fnComplementos(oObjeto){
    
	let oSelecao = document.getElementsByName('comple');
	let nCont, nAux = 0;

	for (nCont = 0; nCont < oSelecao.length; nCont++)
		if (oSelecao[nCont].checked)
			nAux++;

	if (nAux > 3)
	{
		nCont=0;
		while (!oSelecao[nCont].checked || oSelecao[nCont]==oObjeto)
			nCont++
		oSelecao[nCont].checked=false;
	}
}	


/* VALIDANDO - ETAPA 5 */

//Função Finalização
function fnFinal(oObjeto){
    
	let oSelecao = document.getElementsByName('final');
	let nCont, nAux = 0;

	for (nCont = 0; nCont < oSelecao.length; nCont++)
		if (oSelecao[nCont].checked)
			nAux++;

	if (nAux > 2)
	{
		nCont=0;
		while (!oSelecao[nCont].checked || oSelecao[nCont]==oObjeto)
			nCont++
		oSelecao[nCont].checked=false;
	}
}	


/* VALIDANDO Calculadora */
function calcula(){

}



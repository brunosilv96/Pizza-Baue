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

/* --- ETAPA 1 ---  VALIDANDO RADIO --- ETAPA 1 --- */

function validaRadio(div) {

	vetor = Array.from(document.getElementsByName('massa'));
	filtraV = vetor.filter(function(posicao) {return posicao.checked}); /* Filtra os resultados da Váriavel check*/ 
	
    if(filtraV.length == 0){
            alert('Por favor, selecione uma Massa.');
            return false;
	}

	let escolha = filtraV[0].value;
	let msg = document.querySelector(".view-mensagem");

    visualizaDiv(div);
    msg.textContent = escolha;
    return false;
}


/* --- ETAPA 2 --- VALIDANDO Radio --- ETAPA 2 --- */
function validaRadio2(div) {

    vetorM = Array.from(document.getElementsByName('molhos'));
    filtraM = vetorM.filter(function(posicao) {return posicao.checked}); /* Filtra os resultados da Váriavel*/ 
	
    if(filtraM.length == 0){
            alert('Por favor, selecione um Molho.');
            return false;
	}

	let escolha = filtraM[0].value + "<br>";
	let msg = document.querySelector(".view-mensagem2");

	msg.innerHTML = escolha;
    visualizaDiv(div);
    return false;
}


/* --- ETAPA 3 --- VALIDANDO --- ETAPA 3 --- */

/* VALIDANDO CHECKBOX - Ingredientes*/
function validaCheck(div){
	vetorIngre = Array.from(document.getElementsByName('ingre'));
	filtraIngre = vetorIngre.filter(function(posicao) {return posicao.checked});

	if(filtraIngre.length < 3){
		alert('Por favor, selecione no mínimo 3 Ingredientes !');
		return false;
	}

	let nCont = 0;
	let cMsg = "";
	let msg = document.querySelector(".view-mensagem3");
	
	for (nCont=0; nCont<filtraIngre.length; nCont++)
	  cMsg += (filtraIngre[nCont].value) + "<br>";
	
	msg.innerHTML = cMsg;

	visualizaDiv(div);
    return false; 
}

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


/* --- ETAPA 4 --- VALIDANDO --- ETAPA 4 --- */

/* VALIDANDO CHECKBOX - Complementos*/
function validaCheck2(div){
	vetorComple = Array.from(document.getElementsByName('comple'));
	filtraComple = vetorComple.filter(function(posicao) {return posicao.checked});

	if(filtraComple.length < 2){
		alert('Por favor, selecione no mínimo 2 Complementos !');
		return false;
	}

	let nCont = 0;
	let cMsg = "";
	let msg = document.querySelector(".view-mensagem4");
	
	for (nCont=0; nCont<filtraComple.length; nCont++)
	  cMsg += (filtraComple[nCont].value) + "<br>";
	
	msg.innerHTML = cMsg;

	visualizaDiv(div);
    return false; 
}

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


/* --- ETAPA 5 --- VALIDANDO --- ETAPA 5 --- */

/* VALIDANDO CHECKBOX - Finalizações*/
function validaCheck3(div){
	vetorFinal = Array.from(document.getElementsByName('final'));
	filtraFinal = vetorFinal.filter(function(posicao) {return posicao.checked});

	if(filtraFinal.length < 2){
		alert('Por favor, selecione no mínimo 2 Finalizações !');
		return false;
	}

	let nCont = 0;
	let cMsg = "";
	let msg = document.querySelector(".view-mensagem5");
	
	for (nCont=0; nCont<filtraFinal.length; nCont++)
	  cMsg += (filtraFinal[nCont].value) + "<br>";
	
	msg.innerHTML = cMsg;

	visualizaDiv(div);
    return false; 
}

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
	
	vetor = Array.from(document.getElementsByName('valorMassa'));
	filtraV = vetor.filter(function(posicao) {return posicao.checked}); /* Filtra os resultados da Váriavel check*/ 

	let escolha = filtraV[0];
	let msg = document.querySelector(".view-valor");

	msg.textContent = pasrFloat(escolha);



	/*
	let resultado = document.querySelector(".view-valor");

		massa= parseFloat(document.getElementsByName('valorMassa').value);
		molho=parseFloat(document.getElementsByName('valorMolho').value);

		resultado.textContent = parseFloat(massa+molho);
		return false; 
	*/

	
}
	



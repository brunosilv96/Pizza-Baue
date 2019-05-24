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


/* VALIDANDO RADIO - ETAPDA 1 */
function validaRadio(div) {
    if (document.frmMontagem.radio[0].checked == false &&
         document.frmMontagem.radio[1].checked == false && 
         document.frmMontagem.radio[2].checked == false)
        {
            alert('Por favor, selecione um Tipo de Massa.'); 
            return false;
        }
    visualizaDiv(div);
   return true;
}

/* VALIDANDO INGREDIENTES - ETAPA 2 */
//Função Ingredientes
function fnIngredientes(oObjeto){
    
	let oSelecao = document.getElementsByName('ingre');
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

function validaCheck() {
    if(document.frmMontagem.ingre.checked < 1)
	{
        alert('Escolha no minimo 3 ingredientes!');
    }
}


/* FUNCTIONS */

function fnScrollLoadingEffect() {
    var section = document.querySelectorAll(".section-hidden");
    const windowTop = window.pageYOffset + ((window.innerHeight * 2) / 4);
    section.forEach(e => {
        if ((windowTop) > e.offsetTop) {
            e.classList.add('section-visible');
            e.classList.add('fadeIn');
            e.classList.remove('section-hidden');
        }
    });
}

document.querySelector(".modal-close").onclick = function() {
    //Remove a classe "opened" para que o modal suma
    document.querySelector(".modal").classList.remove("opened");
    //Adiciona a classe "closed" para manté-lo fechado
    document.querySelector(".modal").classList.add("closed");
}

function fnModal(modal) {
    //Verifica se existe algum id com o "href" do elemento a, e se tem a classe "opened"
    if (!document.querySelector(modal.getAttribute("href")).classList.contains("opened")) {
        //Se não existir, remove a classe "closed" que mantém o modal fechado
        document.querySelector(modal.getAttribute("href")).classList.remove("closed")
            //Adiciona a classe "opened" para abri-lo
        document.querySelector(modal.getAttribute("href")).classList.add("opened")
    } else {
        //Se existir, adiciona a classe "closed"
        document.querySelector(modal.getAttribute("href")).classList.add("closed");
        //Remove a classe "opened"
        document.querySelector(modal.getAttribute("href")).classList.remove("opened");
    }
}

function fnTabs(tab) {
    //Verifica se a tab que foi clicada está com a classe "tab-selected"
    if (!tab.classList.contains("tab-selected")) {
        //Se não estiver, verifica se o id do elemento clicado é igual a "lost-form"
        if (tab.id == "lost-form") {
            //Se for, adicionar a classe "hide" nas tabs
            document.querySelector(".tabs-select").classList.add("hide");
            //Remove a classe "tab-active" para retirar a tab que está selecionada
            document.querySelector(".tab-active").classList.remove("tab-active");
            //Adiciona a classe "tab-active" para dizer que tem uma tab ativa
            document.getElementById(tab.id + "-tab").classList.add("tab-active");
        } else {
            //Se não, verificar se existe alguma tab com a classe "hide"
            if (document.querySelector(".tabs-select").classList.contains("hide")) {
                //Se existir, remove a classe "hide"
                document.querySelector(".tabs-select").classList.remove("hide");
            }
            //Remove a classe "tab-active" da tab atual
            document.querySelector(".tab-active").classList.remove("tab-active");
            //Adiciona a classe "tab-active" para a tab clicada
            document.getElementById(tab.id + "-tab").classList.add("tab-active");
            //Verifica se a id da tab clicada está selecionada no selector de tabs
            if (!document.getElementById(tab.id).classList.contains("tab-selected")) {
                //Se não existir, remover a classe "tab-selected" da tab que está selecionada
                document.querySelector(".tab-selected").classList.remove("tab-selected");
                //Adiciona a classe "tab-selected" para tab clicalda
                document.getElementById(tab.id).classList.add("tab-selected");
            }
        }
    }
}

function fnBack() {
    //Adiciona a classe "hide" para o selector de tabs
    document.querySelector(".tabs-select").classList.remove("hide");
    //Remove a classe "tab-active" da tab esqueceu sua senha
    document.getElementById("lost-form-tab").classList.remove("tab-active");
    //Adiciona a classe "tab-active" para a tab login
    document.getElementById("login-form-tab").classList.add("tab-active");
}

function fnModalClose() {
    //Remove a classe "opened" do modal
    document.querySelector(".modal").classList.remove("opened");
    //Adiciona a classe "closed" no modal
    document.querySelector(".modal").classList.add("closed");
}

function menuSticky() {
    var navbar = document.querySelector("nav");
    if (window.pageYOffset >= 0.5) {
        navbar.classList.add("scrolling");
    } else {
        navbar.classList.remove("scrolling");
    }
}

/* FIM MODAL */




// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}






/*Criando uma variável do tipo vetor que passará no documento todos os elementos que possuem a classe form_input*/ 
var inputs = document.getElementsByClassName('form_input');

function verificaForm(){
	 	 nome=document.frmcadastro.txtnome.value;
		 email=document.frmcadastro.txtemail.value;
		 telefone=document.frmcadastro.txttelefone.value;


		if(nome == ""){
			alert("Obrigatório preecher o campo Nome !!");
			document.frmcadastro.txtnome.focus();
			return false;
		}

		else if(nome.length < 4){
			alert("Favor informar o nome completo !!");
			document.frmcadastro.txtnome.focus();
			return false;
		}

		else if(email == ""){
				alert("Obrigatório preecher o campo Email");
				document.frmcadastro.txtemail.focus();
				return false;
			}

			else if(email.indexOf('@') >=0 == -1 ||  email.indexOf('.')==-1)//-1 é que não existe o @ e nem o ponto.
			 {
				alert("O email não é valido");
				document.frmcadastro.txtemail.focus();
				return false;
			}

			else if(telefone==""){
			alert("Favor informar o telefone !!");
			document.frmcadastro.txttelefone.focus();
			return false;
		}

			else if(document.frmcadastro.txttelefone.value.length < 10){
					alert("O telefone deve conter no mínimo 10 caracteres");
					document.frmcadastro.txttelefone.focus();
					return false;
				}
        {
            senha1 = document.frmcadastro.senha1.value
            senha2 = document.frmcadastro.senha2.value
    
            if (senha1 != senha2)
                {
                    alert("SENHAS DIFERENTES")
                    document.frmcadastro.senha2.focus();
                    return false;
                }
            if(document.frmcadastro.senha1.value.length < 6)
                {
                    alert("A senha deve conter no mínimo 6 caracteres.");
                    document.frmcadastro.senha1.focus();
                    return false;
                }
        }
}

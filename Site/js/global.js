
/* EVENTS */
window.onscroll = function() {
    menuSticky()
};
window.addEventListener('scroll', () => {
    fnScrollLoadingEffect();
});

document.querySelector("body").onload = function() {
    document.querySelector(".loading").style.opacity = 0;
    document.querySelector(".page").classList.remove("hidden");
    document.querySelector(".page").classList.add("visible");
    setTimeout(function() {
        document.querySelector(".loading").style.display = "none";
    }, 300);

};
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
    // Remove a classe "opened" para que o modal suma
    document.querySelector(".modal").classList.remove("opened");
    // Adiciona a classe "closed" para manté-lo fechado
    document.querySelector(".modal").classList.add("closed");
}

function fnModal(modal) {
    // Verifica se existe algum id com o "href" do elemento a, e se tem a classe
	// "opened"
    if (!document.querySelector(modal.getAttribute("href")).classList.contains("opened")) {
        // Se não existir, remove a classe "closed" que mantém o modal fechado
        document.querySelector(modal.getAttribute("href")).classList.remove("closed")
            // Adiciona a classe "opened" para abri-lo
        document.querySelector(modal.getAttribute("href")).classList.add("opened")
    } else {
        // Se existir, adiciona a classe "closed"
        document.querySelector(modal.getAttribute("href")).classList.add("closed");
        // Remove a classe "opened"
        document.querySelector(modal.getAttribute("href")).classList.remove("opened");
    }
}

function fnTabs(tab) {
    // Verifica se a tab que foi clicada está com a classe "tab-selected"
    if (!tab.classList.contains("tab-selected")) {
        // Se não estiver, verifica se o id do elemento clicado é igual a
		// "lost-form"
        if (tab.id == "lost-form") {
            // Se for, adicionar a classe "hide" nas tabs
            document.querySelector(".tabs-select").classList.add("hide");
            // Remove a classe "tab-active" para retirar a tab que está
			// selecionada
            document.querySelector(".tab-active").classList.remove("tab-active");
            // Adiciona a classe "tab-active" para dizer que tem uma tab ativa
            document.getElementById(tab.id + "-tab").classList.add("tab-active");
        } else {
            // Se não, verificar se existe alguma tab com a classe "hide"
            if (document.querySelector(".tabs-select").classList.contains("hide")) {
                // Se existir, remove a classe "hide"
                document.querySelector(".tabs-select").classList.remove("hide");
            }
            // Remove a classe "tab-active" da tab atual
            document.querySelector(".tab-active").classList.remove("tab-active");
            // Adiciona a classe "tab-active" para a tab clicada
            document.getElementById(tab.id + "-tab").classList.add("tab-active");
            // Verifica se a id da tab clicada está selecionada no selector de
			// tabs
            if (!document.getElementById(tab.id).classList.contains("tab-selected")) {
                // Se não existir, remover a classe "tab-selected" da tab que
				// está selecionada
                document.querySelector(".tab-selected").classList.remove("tab-selected");
                // Adiciona a classe "tab-selected" para tab clicalda
                document.getElementById(tab.id).classList.add("tab-selected");
            }
        }
    }
}

function fnBack() {
    // Adiciona a classe "hide" para o selector de tabs
    document.querySelector(".tabs-select").classList.remove("hide");
    // Remove a classe "tab-active" da tab esqueceu sua senha
    document.getElementById("lost-form-tab").classList.remove("tab-active");
    // Adiciona a classe "tab-active" para a tab login
    document.getElementById("login-form-tab").classList.add("tab-active");
}

function fnModalClose() {
    // Remove a classe "opened" do modal
    document.querySelector(".modal").classList.remove("opened");
    // Adiciona a classe "closed" no modal
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


var inputs = document.getElementsByClassName('form_input');

function verificaForm(event){
		 event.preventDefault();
         nome = document.getElementById("txtNome").value;
         email = document.getElementById("txtEmail").value;
         cpf = document.getElementById("cpf").value;
         senha1 = document.getElementById("senha").value;
         senha2 = document.getElementById("confirmasenha").value;


        if(nome == ""){
            alert("Obrigatório preecher o campo Nome !!");
            // document.frmcadastro.txtnome.focus();
            return false;
        }

        else if(nome.length < 4){
            alert("Favor informar o nome completo !!");
            // document.frmcadastro.txtnome.focus();
            return false;
        }

        else if(email == ""){
                alert("Obrigatório preecher o campo Email");
                // document.frmcadastro.txtemail.focus();
                return false;
         }

        else if(email.indexOf('@') < 0 || email.indexOf('.') < 0){
        	// -1 é que não existe o @ e nem o ponto.
            alert("O email não é valido");
           // document.frmcadastro.txtemail.focus();
            return false;
        }
        else if(cpf == ""){
            alert("Obrigatório preecher o campo cpf")
            // document.frmcadastro.txtcpf.focus();
            return false;
        }
        else if(cpf.length < 11){
            alert("O cpf deve conter 11 digitos")
            // document.frmcadastro.txtcpf.focus();
            return false;
        }
        else if (senha1.length < 6){
            alert("A senha deve conter no mínimo 6 caracteres.");
            // document.frmcadastro.senha1.focus();
            return false;
        }
        else if (senha2 ==""){
            alert("Por favor confirme sua senha");
           // document.frmcadastro.senha2.focus();
            return false;
        }

        else if(senha1 != senha2){
            alert("SENHAS DIFERENTES")
            // document.frmcadastro.senha2.focus();
            return false;
        }
        
        document.getElementById("frmcadastro").submit();
        return true;
}

// MASCARA CPF
function fMasc(objeto,mascara) {
    obj = objeto
    masc = mascara
    setTimeout("fMascEx()",1)
}
function fMascEx() {
    obj.value=masc(obj.value)
}
function mCPF(cpf){
    cpf = document.getElementById("cpf").value.replace(/\D/g,"")
    cpf = document.getElementById("cpf").value.replace(/(\d{3})(\d)/,"$1.$2")
    cpf = document.getElementById("cpf").value.replace(/(\d{3})(\d)/,"$1-$2")
    cpf = document.getElementById("cpf").value.replace(/(\d{3})(\d{1,2})$/,"$1.$2")
    return cpf
}

/* CARROSEL DE PIZZAS */

var responsiveSlider = function() {
var slider = document.getElementById("slider");
var sliderWidth = slider.offsetWidth;
var slideList = document.getElementById("slideWrap");
var count = 1;
var items = slideList.querySelectorAll("#itemsSlider").length-1;
var prev = document.getElementById("prev");
var next = document.getElementById("next");

window.addEventListener('resize', function() {
  sliderWidth = slider.offsetWidth;
});

var prevSlide = function() {
  if(count > 1) {
    count = count - 2;
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
  else if(count = 1) {
    count = items - 1;
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
};

var nextSlide = function() {
  if(count < items) {
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
  else {
    count = items;
    slideList.style.left = "0px";
    count = 1;
  }
};

next.addEventListener("click", function() {
  nextSlide();
});

prev.addEventListener("click", function() {
  prevSlide();
});

setInterval(function() {
  nextSlide()
}, 8000);

};

window.onload = function() {
responsiveSlider();  
}


function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
     var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


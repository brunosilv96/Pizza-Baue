
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

//ValidaçãoCPF

var btnEnvia = document.querySelector('#envia');
var campoCpf = document.querySelector('#cpf');
var view2 = document.querySelector(".campo-cpf");
var viewcpf = document.querySelector(".viewCPF");

btnEnvia.addEventListener('click', () => {

    event.preventDefault();

    var campo = new Array(14);
    var cpf = new Array(11);

    campo = campoCpf.value;

    if ((!(/\d{3}.\d{3}.\d{3}-\d{2}/.test(campo)))) {
        //view2.textContent = '*Preencha o campo CPF Corretamente';
        ///view2.classList.add('mudaView');
        ///campoCpf.classList.add('erro');
    } else {

        ///view2.classList.remove('mudaView');
        //campoCpf.classList.remove('erro');

        cpf = campo;
        cpf = cpf.split('.').join('');
        cpf = cpf.split('-').join('');

    }



    var result = parseInt((cpf[0] * 10 + cpf[1] * 9 + cpf[2] * 8 + cpf[3] * 7 + cpf[4] * 6 + cpf[5] * 5 + cpf[6] * 4 + cpf[7] * 3 + cpf[8] * 2));


    var resto = (result * 10) % 11;

    //console.log(resto);



    var result1 = parseInt((cpf[0] * 11) + (cpf[1] * 10) + (cpf[2] * 9) + (cpf[3] * 8) + (cpf[4] * 7) + (cpf[5] * 6) + (cpf[6] * 5) + (cpf[7] * 4 + cpf[8] * 3) + cpf[9] * 2);

    var resto1 = (result1 * 10) % 11;
    //console.log(resto1);


    if (resto1 == 10 || resto1 == 11) {
        resto1 = 0;
        //  console.log(resto1);
    }


    if (!(cpf[9] == resto && cpf[10] == resto1)) {

        viewcpf.textContent = '*CPF inválido';
        view2.classList.add('campo-cpf-muda');
        //campoCpf.classList.add('erro');
    } else {
        viewcpf.textContent = '*CPF Válido';
        view2.classList.remove('campo-cpf-muda');

        if ((cpf[0] == cpf[1]) && (cpf[1] == cpf[2]) &&
            (cpf[2] == cpf[3]) && (cpf[3] == cpf[4]) && (cpf[4] == cpf[5]) &&
            (cpf[6] == cpf[7]) && (cpf[8] == cpf[9]) && cpf[9] == cpf[10]) {

            viewcpf.textContent = '*CPF inválido';
            view2.classList.add('campo-cpf-muda');
            //campoCpf.classList.add('erro');
        }




    }

});



/* CARROSEL */

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



function fnCarrega(arquivo)
{
    /*verifica se existe um arquivo selecionado dentro do input,
    e testando se existe a posição 0 do vetor
    */
    if(arquivo.files && arquivo.files[0])
    {
        //FileReader ler o arquivo na máquina do usuario
        let Imagem = new FileReader();

        //após terminar com sucesso a leitura do arquivo, executar o load
        Imagem.onload = function (foto)
        {
            //Coloca o arquivo que o usuario inseriu no input, no elemento img
            frnCadastro.imgFoto.src = foto.target.result;
            
        }
        //readAsDataURL ler o arquivo file, quando a leitura acaba o evento loaded é disparado
        //e irá conter a URL do arquivo.
        Imagem.readAsDataURL(arquivo.files[0]);
    }
 }
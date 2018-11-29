<?php 
/* Criando a Classe do Endereço do Usuário */

class Endereco {
    
    private $logradouro;
    private $numero;
    private $cidade;
    private $uf;
    private $complemento;
    
    public function verificaForm(Array $campos){
        foreach($campos as $itens){
            if (isset($_POST[$itens]) == true) {
                return true;
            } else {
                echo "O campo não existe: ". $campos;
                break;
                return false;
            }
        }
    }
    
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getCidade()
    {
        return $this->estado;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setLogradouro($logradouro)
    {
        $this->lagradouro = $lagradouro;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function setCidade($cidade)
    {
        $this->estado = $cidade;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }
}

?>
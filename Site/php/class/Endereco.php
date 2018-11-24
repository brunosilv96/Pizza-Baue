<?php 
/* Criando a Classe do Endereço do Usuário */

class Endereco {
    
    private $lagradouro;
    private $numero;
    private $estado;
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
    
    public function getLagradouro()
    {
        return $this->lagradouro;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getEstado()
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

    public function setLagradouro($lagradouro)
    {
        $this->lagradouro = $lagradouro;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    function function_name() {
        
    }
}

?>
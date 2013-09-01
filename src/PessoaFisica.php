<?php
/**
 * Created by JetBrains PhpStorm.
 * User: italolelis
 * Date: 8/28/13
 * Time: 3:52 PM
 * To change this template use File | Settings | File Templates.
 */

class PessoaFisica extends Pessoa
{

    private $cpf;

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    function __toString()
    {
        return $this->getNome();
    }

}
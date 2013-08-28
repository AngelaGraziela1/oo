<?php
/**
 * Created by JetBrains PhpStorm.
 * User: italolelis
 * Date: 8/28/13
 * Time: 3:53 PM
 * To change this template use File | Settings | File Templates.
 */

class PessoaJuridica extends Pessoa
{

    private $cnpj;

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }


}
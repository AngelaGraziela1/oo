<?php
/**
 * Created by JetBrains PhpStorm.
 * User: italolelis
 * Date: 8/28/13
 * Time: 4:03 PM
 * To change this template use File | Settings | File Templates.
 */

class Funcionario extends Pessoa
{

    private $ctps;

    /**
     * @param mixed $ctps
     */
    public function setCtps($ctps)
    {
        $this->ctps = $ctps;
    }

    /**
     * @return mixed
     */
    public function getCtps()
    {
        return $this->ctps;
    }


}
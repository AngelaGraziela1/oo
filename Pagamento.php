<?php
/**
 * Created by JetBrains PhpStorm.
 * User: italolelis
 * Date: 8/28/13
 * Time: 4:49 PM
 * To change this template use File | Settings | File Templates.
 */

class Pagamento {

    private $metodo;
    private $valor;

    public function __construct($metodo, $valor)
    {
        $this->metodo = $metodo;
        $this->valor = $valor;
    }

    /**
     * @param mixed $metodo
     */
    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;
    }

    /**
     * @return mixed
     */
    public function getMetodo()
    {
        return $this->metodo;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }


}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: italolelis
 * Date: 8/28/13
 * Time: 3:56 PM
 * To change this template use File | Settings | File Templates.
 */

class ItemVenda
{

    private $id;

    /**
     * @var Produto
     */
    private $produto;
    private $qtd;

    public function __construct($produto, $qtd)
    {
        $this->produto = $produto;
        $this->qtd = $qtd;
    }

    /**
     * @return \Produto
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * @return mixed
     */
    public function getQtde()
    {
        return $this->qtd;
    }

    public function getTotal()
    {
        return $this->produto->getPreco() * $this->qtd;
    }

    /**
     * @param mixed $qtd
     */
    public function setQtd($qtd)
    {
        $this->qtd = $qtd;
    }

}
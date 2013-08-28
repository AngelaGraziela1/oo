<?php
/**
 * Created by JetBrains PhpStorm.
 * User: italolelis
 * Date: 8/28/13
 * Time: 3:54 PM
 * To change this template use File | Settings | File Templates.
 */

class Produto {

    private $id;
    private $descricao;
    private $preco;
    private $estoque = 0;

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    public function addEstoque($qtde){
        $this->estoque += $qtde;
    }

    public function baixarEstoque($qtde){

        if($qtde > $this->estoque){
            throw new LogicException('Estoque insuficiente');
        }

        $this->estoque -= $qtde;
    }
}
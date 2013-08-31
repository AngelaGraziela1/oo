<?php

class Venda implements SplSubject
{

    private $id;
    private $data;

    /**
     * @var \Easy\Collections\Collection
     */
    private $itens;

    /**
     * @var \Easy\Collections\Collection
     */
    private $pagamentos;

    /**
     * @var Pessoa
     */
    private $cliente;

    /**
     * @var Funcionario
     */
    private $atendente;
    private $observers = array();

    public function __construct($atendente, $cliente, $data)
    {
        $this->atendente = $atendente;
        $this->cliente = $cliente;
        $this->data = $data;
        $this->itens = new \Easy\Collections\Collection();
        $this->pagamentos = new \Easy\Collections\Collection();
        $this->observers = new \Easy\Collections\Collection();
    }

    /**
     * @param \Funcionario $atendente
     */
    public function setAtendente($atendente)
    {
        $this->atendente = $atendente;
    }

    /**
     * @return \Funcionario
     */
    public function getAtendente()
    {
        return $this->atendente;
    }

    /**
     * @param \Pessoa $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return \Pessoa
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
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
     * @param array $itens
     */
    public function setItens($itens)
    {
        $this->itens = $itens;
    }

    /**
     * @return array
     */
    public function getItens()
    {
        return $this->itens;
    }

    public function addItem(ItemVenda $item)
    {
        $this->itens->add($item);
    }

    public function addItens(array $items)
    {
        $this->itens->addRange($items);
    }

    public function removerItem(ItemVenda $item)
    {
        $this->itens->remove($item);
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->itens as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }

    /**
     * @return \Easy\Collections\Collection
     */
    public function getPagamentos()
    {
        return $this->pagamentos;
    }

    public function finalizar(\Easy\Collections\Collection $pagamentos)
    {
        $this->pagamentos = $pagamentos;
        $this->notify();
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Attach an SplObserver
     * @link http://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return void
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->add($observer);
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Detach an observer
     * @link http://php.net/manual/en/splsubject.detach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     * @return void
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->remove($observer);
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Notify an observer
     * @link http://php.net/manual/en/splsubject.notify.php
     * @return void
     */
    public function notify()
    {
        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }


}
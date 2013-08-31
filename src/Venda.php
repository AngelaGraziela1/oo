<?php

use Event\EventInterface;
use Observer\SubscriberInterface;

class Venda implements \Observer\ObserverInterface
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
        $this->notify(new \Event\AddItemEvent($item));
    }

    public function addItens(array $items)
    {
       foreach($items as $item){
           $this->addItem($item);
       }
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
        $this->notify(new \Event\VendaFinalizadaEvent($this));
    }

    public function attach(SubscriberInterface $subscriber, $event)
    {
        $this->observers->add(array(
            'event' => $event,
            'subscriber' => $subscriber
        ));
    }

    public function detach(SubscriberInterface $subscriber)
    {
        $this->observers->remove($subscriber);
    }

    public function notify(EventInterface $event)
    {
        $eventClass = get_class($event);

        foreach ($this->observers as $s) {
            $subscriber = $s['subscriber'];
            if ($eventClass === $s['event']) {
                $subscriber->update($event);
            }
        }
    }

}
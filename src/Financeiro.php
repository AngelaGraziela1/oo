<?php

use Event\EventInterface;
use Observer\SubscriberInterface;

class Financeiro implements \Observer\ObserverInterface
{

    private static $instance;
    private $valorTotal;
    private $observers;
    private $contasPagar;

    private function __construct()
    {
        $this->observers = new \Easy\Collections\Collection();
        $this->contasPagar = new \Easy\Collections\Collection();
    }

    private function __clone()
    {

    }

    /**
     * prevent from being unserialized
     *
     * @return void
     */
    private function __wakeup()
    {

    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new Financeiro();
        }

        return static::$instance;
    }

    public function faturar(Venda $venda)
    {
        foreach ($venda->getPagamentos() as $pagamento) {
            if ($pagamento->getMetodo() !== FormaPagamento::CARTAO_CREDITO) {
                $this->valorTotal += $pagamento->getValor();
            } else {
                $this->contasPagar->add(new ContaPagar($pagamento, \Easy\Date\Date::tomorrow()));
            }
        }

        $this->notify(new \Event\OnFaturarVendaEvent($this));
    }

    /**
     * @return mixed
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function getTotalCartao()
    {
        $total = 0;
        foreach($this->contasPagar as $conta){
            $total += $conta->getPagamento()->getValor();
        }
        return $total;
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
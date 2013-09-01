<?php

use Event\EventInterface;
use Observer\SubscriberInterface;

class Financeiro implements \Observer\ObserverInterface
{

    private static $instance;
    private $valorTotal;
    private $observers;

    private function __construct()
    {
        $this->observers = new \Easy\Collections\Collection();
    }

    private function __clone(){

    }

    public static function getInstance()
    {
        if(static::$instance === null){
            static::$instance = new Financeiro();
        }

        return static::$instance;
    }

    public function faturar(Venda $venda)
    {
        $this->valorTotal += $venda->getTotal();

        $this->notify(new \Event\OnFaturarVendaEvent($this));

        /*foreach ($venda->getPagamentos() as $pagamento) {
            $this->valorTotal += $pagamento->getValor();
        }*/
    }

    /**
     * @return mixed
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
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
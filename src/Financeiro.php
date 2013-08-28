<?php

class Financeiro
{

    private $valorTotal;

    public function faturar(Venda $venda)
    {
        foreach ($venda->getPagamentos() as $pagamento) {
            $this->valorTotal += $pagamento->getValor();
        }
    }
}
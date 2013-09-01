<?php
/**
 * This file is part of oo.
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 *
 * Author: italolelis
 * Date: 8/29/13
 */

namespace Impressora;


use Event\EventInterface;
use Observer\SubscriberInterface;
use SplSubject;

class Html implements SubscriberInterface
{

    public function update(EventInterface $event)
    {
        $venda = $event->getVenda();

        $htmlContent = sprintf("<h1>HTML - %s</h1>", $venda->getId());

        $htmlContent .= sprintf('Cliente %s - %s', $venda->getCliente()->getNome(), $venda->getData()->format('d-m-Y H:i:s'));
        $htmlContent .= "<br>";
        $htmlContent .= "-------------------";
        $htmlContent .= "<br>";
        $htmlContent .= sprintf('Atendente: %s', $venda->getAtendente()->getNome());
        $htmlContent .= "<br>";
        $htmlContent .= '-------------------';
        $htmlContent .= "<br>";
        $htmlContent .= sprintf('Produto | valorUn | qtde | total');
        $htmlContent .= "<br>";

        foreach ($venda->getItens() as $item) {
            $htmlContent .= $item->getProduto()->getDescricao() . ' | ' . $item->getProduto()->getPreco() . ' | ' . $item->getQtde() . ' | ' . $item->getTotal() . '<br>';
        }

        $htmlContent .= "<br>";
        $htmlContent .= '-------------------';
        $htmlContent .= "<br>";
        $htmlContent .= sprintf('Total: %s', $venda->getTotal());
        $htmlContent .= "<br>";
        $htmlContent .= '-------------------';
        $htmlContent .= "<br>";

        foreach ($venda->getPagamentos() as $item) {
            $metodo = new \FormaPagamento($item->getMetodo());
            $htmlContent .= $metodo . ' - ' . $item->getValor() . '<br>';
        }

        $htmlContent .= "<br>";
        foreach ($venda->getItens() as $item) {
            $htmlContent .= $item->getProduto()->getEstoque() . '<br>';
        }

        echo $htmlContent;
    }


}
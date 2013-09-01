<?php
/**
 * This file is part of oo.
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 *
 * Author: italolelis
 * Date: 8/29/13
 */

namespace Estoque\Impressora;

use Event\EventInterface;
use Observer\SubscriberInterface;

class ImprimirEstoque implements SubscriberInterface
{

    public function update(EventInterface $event)
    {
        $venda = $event->getVenda();
        $htmlContent = "";
        $htmlContent .= "<br>";
        foreach ($venda->getItens() as $item) {
            $htmlContent .= sprintf("<strong>Produto:</strong> %s - <strong>Estoque:</strong> %s", $item->getProduto()->getDescricao(), $item->getProduto()->getEstoque()) . '<br>';
        }
        echo $htmlContent;
    }

}
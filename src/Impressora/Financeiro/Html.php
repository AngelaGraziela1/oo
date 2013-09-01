<?php
/**
 * This file is part of oo. 
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 * 
 * Author: italolelis
 * Date: 9/1/13
 */

namespace Impressora\Financeiro;


use Easy\Utility\Numeric\Number;
use Event\EventInterface;
use Observer\SubscriberInterface;

class Html implements SubscriberInterface {

    public function update(EventInterface $event)
    {
        $financeiro = $event->getFinanceiro();

        $htmlContent = "";

        $htmlContent .= sprintf("<strong>CARTOES:</strong> %s", Number::currency($financeiro->getTotalCartao(), 'REAL')) . "<br>";
        $htmlContent .= sprintf("<strong>CAIXA:</strong> %s", Number::currency($financeiro->getValorTotal(), 'REAL'));

        echo $htmlContent;
    }

}
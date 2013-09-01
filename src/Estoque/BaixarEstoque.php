<?php
/**
 * This file is part of oo.
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 *
 * Author: italolelis
 * Date: 8/29/13
 */

namespace Estoque;

use Event\EventInterface;
use Observer\SubscriberInterface;

class BaixarEstoque implements SubscriberInterface
{

    public function update(EventInterface $event)
    {
        $item = $event->getItem();
        $item->getProduto()->baixarEstoque($item->getQtde());
    }

}
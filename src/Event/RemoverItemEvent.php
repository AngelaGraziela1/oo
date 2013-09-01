<?php
/**
 * This file is part of oo.
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 *
 * Author: italolelis
 * Date: 8/29/13
 */

namespace Event;

class RemoverItemEvent implements EventInterface
{

    private $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * @param mixed $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

}
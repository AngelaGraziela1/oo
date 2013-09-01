<?php
/**
 * This file is part of oo.
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 *
 * Author: italolelis
 * Date: 8/29/13
 */

namespace Event;

class OnFaturarVendaEvent implements EventInterface
{

    private $financeiro;

    public function __construct($financeiro)
    {
        $this->financeiro = $financeiro;
    }

    /**
     * @param mixed $financeiro
     */
    public function setFinanceiro($financeiro)
    {
        $this->financeiro = $financeiro;
    }

    /**
     * @return mixed
     */
    public function getFinanceiro()
    {
        return $this->financeiro;
    }



}
<?php
/**
 * This file is part of oo. 
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 * 
 * Author: italolelis
 * Date: 9/1/13
 */

class ContaPagar {

    private $id;
    private $vencimento;
    private $pagamento;

    public function __construct(Pagamento $pagamento, $vencimento)
    {
        $this->pagamento = $pagamento;
        $this->vencimento = $vencimento;
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
     * @param mixed $pagamento
     */
    public function setPagamento($pagamento)
    {
        $this->pagamento = $pagamento;
    }

    /**
     * @return mixed
     */
    public function getPagamento()
    {
        return $this->pagamento;
    }

    /**
     * @param mixed $vencimento
     */
    public function setVencimento($vencimento)
    {
        $this->vencimento = $vencimento;
    }

    /**
     * @return mixed
     */
    public function getVencimento()
    {
        return $this->vencimento;
    }


}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: italolelis
 * Date: 8/28/13
 * Time: 3:55 PM
 * To change this template use File | Settings | File Templates.
 */

class Financeiro {

    private $valorTotal;

    public function faturar(Venda $venda){
        foreach($venda->getPagamentos() as $pagamento){
            $this->valorTotal += $pagamento->getValor();
        }
    }
}
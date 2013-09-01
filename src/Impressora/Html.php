<?php
/**
 * This file is part of oo.
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 *
 * Author: italolelis
 * Date: 8/29/13
 */

namespace Impressora;


use Component\WebControls\Html\Table\Table;
use Easy\Utility\Numeric\Number;
use Event\EventInterface;
use Observer\SubscriberInterface;
use SplSubject;

class Html implements SubscriberInterface
{

    public function update(EventInterface $event)
    {
        $venda = $event->getVenda();

        $htmlContent = sprintf("<h1>Venda - %s</h1>", $venda->getId());

        $htmlContent .= sprintf('Cliente: %s - %s', $venda->getCliente()->getNome(), $venda->getData()->format('d-m-Y H:i:s'));
        $htmlContent .= "<br>";
        $htmlContent .= "-------------------";
        $htmlContent .= "<br>";
        $htmlContent .= sprintf('Atendente: %s', $venda->getAtendente()->getNome());
        $htmlContent .= "<br>";
        $htmlContent .= '-------------------';
        $htmlContent .= "<br>";

        $tr = "";
        foreach ($venda->getItens() as $item) {
            $html = "";
            $html .= '<td>' . $item->getProduto()->getDescricao() . '</td>';
            $html .= sprintf("<td>%s</td>",Number::currency( $item->getProduto()->getPreco(), 'REAL'));
            $html .= sprintf("<td>%s</td>",$item->getQtde());
            $html .= sprintf("<td>%s</td>",$item->getTotal());
            $tr .= sprintf("<tr>%s</tr>", $html);
        }
        $htmlContent .= $this->createTable($tr);

        $htmlContent .= "<br>";
        $htmlContent .= '-------------------';
        $htmlContent .= "<br>";
        $htmlContent .= sprintf('Total: %s', $venda->getTotal());
        $htmlContent .= "<br>";
        $htmlContent .= '-------------------';
        $htmlContent .= "<br>";

        foreach ($venda->getPagamentos() as $item) {
            $metodo = new \FormaPagamento($item->getMetodo());
            $htmlContent .= $metodo . ' - ' . Number::currency($item->getValor(), 'REAL') . '<br>';
        }

        echo $htmlContent;
    }

    private function createTable($data){
        $table = new Table();
        return $table->render(array(
            "Produto",
            "ValorUn",
            "Qtde",
            "Total"
        ), $data);
    }

}
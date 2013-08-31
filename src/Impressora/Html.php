<?php
/**
 * This file is part of oo. 
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 * 
 * Author: italolelis
 * Date: 8/29/13
 */

namespace Impressora;


use SplSubject;

class Html implements \SplObserver{

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     */
    public function update(SplSubject $subject)
    {
        $htmlContent = "";
        
        $htmlContent .= sprintf('Cliente %s - %s', $subject->getCliente()->getNome(), $subject->getData()->format('d-m-Y H:i:s'));
        $htmlContent .= "<br>";
        $htmlContent .= "-------------------";
        $htmlContent .= "<br>";
        $htmlContent .= sprintf('Atendente: %s', $subject->getAtendente()->getNome());
        $htmlContent .= "<br>";
        $htmlContent .= '-------------------';
        $htmlContent .= "<br>";
        $htmlContent .= sprintf('Produto | valorUn | qtde | total');
        $htmlContent .= "<br>";

        foreach ($subject->getItens() as $item) {
            $htmlContent .= $item->getProduto()->getDescricao() . ' | ' . $item->getProduto()->getPreco() . ' | ' . $item->getQtde() . ' | ' . $item->getTotal() . '<br>';
        }

        $htmlContent .= "<br>";
        $htmlContent .= '-------------------';
        $htmlContent .= "<br>";
        $htmlContent .= sprintf('Total: %s', $subject->getTotal());
        $htmlContent .= "<br>";
        $htmlContent .= '-------------------';
        $htmlContent .= "<br>";

        foreach ($subject->getPagamentos() as $item) {
            $htmlContent .= $item->getMetodo() . ' - ' . $item->getValor() . '<br>';
        }

        $htmlContent .= "<br>";
        foreach ($subject->getItens() as $item) {
            $htmlContent .= $item->getProduto()->getEstoque() . '<br>';
        }

        echo $htmlContent;
    }


}
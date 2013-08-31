<?php
/**
 * This file is part of oo. 
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 * 
 * Author: italolelis
 * Date: 8/29/13
 */

namespace Estoque;

class Manager implements \SplObserver {

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param \SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     */
    public function update(\SplSubject $subject)
    {
        foreach ($subject->getItens() as $item) {
           $item->getProduto()->baixarEstoque($item->getQtde());
        }
    }

}
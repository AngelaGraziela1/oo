<?php
/**
 * This file is part of oo. 
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 * 
 * Author: italolelis
 * Date: 8/31/13
 */

class FormaPagamento extends \Easy\Enum {

    const __default = 1;
    const  CARTAO_CREDITO = 1;
    const  CARTAO_DEBITO = 2;
    const  DINHEIRO = 3;
}
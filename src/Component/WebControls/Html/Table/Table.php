<?php

// Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.

namespace Component\WebControls\Html\Table;

use Easy\Mvc\View\Builders\TagBuilder;
use Easy\Mvc\View\Builders\TagRenderMode;

class Table
{

    /**
     * {@inheritdoc}
     */
    public function render($fields, $data, $tableAttr = array(), $thAttr = array())
    {
        $table_string = "";

        $table_string .= $this->buildThead($fields, $thAttr);
        $table_string .= $this->buildTbody($data, array(), array(), array());
        $table_string .= $this->buildTfooter(array(), array(), array());

        $table = new TagBuilder('table');
        $table->mergeAttributes($tableAttr);
        $table->setInnerHtml($table_string);

        return $table->toString(TagRenderMode::NORMAL);
    }

    public function buildThead($fields, $thAttr = array())
    {
        $thead = new TagBuilder('thead');
        $tr = new TagBuilder('tr');
        $tr_string = "";

        foreach ($fields as $field) {
            $td = new TagBuilder('td');
            $td->setInnerHtml($field);
            $td->mergeAttributes($thAttr);
            $tr_string .= $td->toString(TagRenderMode::NORMAL);
        }

        $tr->setInnerHtml($tr_string);
        $thead->setInnerHtml($tr->toString(TagRenderMode::NORMAL));

        return $thead->toString(TagRenderMode::NORMAL);
    }

    public function buildTbody($data, $tbodyAttr = array(), $trAttr = array(), $thAttr = array())
    {
        $tbody = new TagBuilder('tbody');
        $tbody->setInnerHtml($data);
        return $tbody->toString(TagRenderMode::NORMAL);
    }

    public function buildTfooter($tbodyAttr = array(), $trAttr = array(), $thAttr = array())
    {
        $tbody = new TagBuilder('tfooter');
        return $tbody->toString(TagRenderMode::NORMAL);
    }

}

<?php
/**
 * This file is part of oo. 
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 * 
 * Author: italolelis
 * Date: 9/1/13
 */

namespace Singleton;

/**
 * Class DB para exemplificar o Singleton
 */
class DB {

    private static $instance;
    private $id;

    private function __construct()
    {
        echo "Fui contruido";
        $this->id = 1;
    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        if(static::$instance === null){
            static::$instance = new DB();
        }

        return static::$instance;
    }

    /**
     * prevent from being unserialized
     *
     * @return void
     */
    private function __wakeup()
    {

    }

}
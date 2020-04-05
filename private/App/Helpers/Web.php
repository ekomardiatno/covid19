<?php

/**
 * Web 1.1 - Created by Eko Mardiatno.
 * Copyright 2018 KOMA MVC. All Right Reserved.
 * Instagram @komafx
 * Licensed under MIT (https://github.com/ekomardiatno/koma-mvc/blob/master/LICENSE)
 */

class Web
{

    public static function assets($name, $type)
    {

        return getenv('APP_URL') . 'assets/' . $type . '/' . $name;

    }

    public static function url($url = '')
    {

        $url = str_replace('.', '/', $url);
        return getenv('APP_URL') . $url;

    }

}

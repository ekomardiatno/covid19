<?php

/**
 * Routing 1.4.0 - Created by Eko Mardiatno.
 * Copyright 2018 KOMA MVC. All Right Reserved.
 * Instagram @komafx
 * Licensed under MIT (https://github.com/ekomardiatno/koma-mvc/blob/master/LICENSE)
 */

class Route
{

    private $controller = 'HomeController',
        $method = 'index',
        $params = [],
        $dirController = 'private/App/Controllers/',
        $error_404 = 'private/App/Views/error/404.php';

    public function __construct()
    {

        $get = $this->parseURL();

        $url = $get['url'];

        if ($get['sub_dir'] != '') {

            $this->dirController = $this->dirController . $get['sub_dir'] . '/';
        }

        if (isset($url[0])) {

            $url[0] = ucfirst($url[0]);
            if (strpos($url[0], '-')) {
                $str_explode = explode('-', $url[0]);
                $url[0] = '';
                foreach ($str_explode as $s) {
                    $url[0] .= ucfirst($s) . '_';
                }
                $url[0] = substr($url[0], 0, -1);
            }
            if (file_exists($this->dirController . $url[0] . 'Controller.php')) {

                $this->controller = $url[0] . 'Controller';
                unset($url[0]);
            } else {

                return require_once $this->error_404;
            }
        }

        require_once $this->dirController . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {

            if (method_exists($this->controller, $url[1])) {

                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {

            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {

        if (isset($_GET['url'])) {

            $url = explode('/', filter_var(trim($_GET['url']), FILTER_SANITIZE_URL));
            $sub_dir = '';

            if (is_dir($this->dirController . $url[0])) {

                $sub_dir = $url[0];
                unset($url[0]);
            }

            if (!empty($url)) {

                $url = array_values($url);
            }

            return $set = ['sub_dir' => $sub_dir, 'url' => $url];
        }
    }
}

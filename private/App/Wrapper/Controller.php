<?php

/**
 * Controller 1.1.1 - Created by Eko Mardiatno.
 * Copyright 2018 KOMA MVC. All Right Reserved.
 * Instagram @komafx
 * Licensed under MIT (https://github.com/ekomardiatno/koma-mvc/blob/master/LICENSE)
 */

class Controller extends BaseController
{

    private $dir_model = 'private/App/Models/',
        $hasLogin = false,
        $_web;

    public function __construct()
    {
        parent::__construct();
        $this->_web = Web::getInstance();
    }

    public function layout($file)
    {
        $this->_web->layout($file);
    }

    public function title($title)
    {
        $this->_web->title($title);
    }

    public function desc($desc)
    {
        $this->_web->desc($desc);
    }

    public function breadcrumb($breadcrumb = null)
    {
        $this->_web->breadcrumb($breadcrumb);
    }

    public function view($file, $data = [])
    {
        $this->_web->view($file, $data);
    }

    public function model($file)
    {
        require_once $this->dir_model . $file . '.php';
        return new $file;
    }

    public function redirect($url, $data = [])
    {
        $url = str_replace('.', '/', $url);
        header('location: ' . getenv('APP_URL') . $url);
    }

    public function role($role = [])
    {
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url = str_replace(getenv('APP_URL'), '', $url);
        $url = str_replace('/', '.', $url);

        if ($_SESSION) {

            if (isset($_SESSION['auth'])) {

                $this->hasLogin = $_SESSION['auth']['hasLogin'];
            }
        }

        if ($this->hasLogin) {
            if (!in_array($_SESSION['auth']['role'], $role)) {
                $this->redirect('admin');
            }
        } else {
            Auth::setUrl($url);
            $this->redirect('admin.login');
        }
    }

    public function data()
    {
        return parent::data();
    }
}

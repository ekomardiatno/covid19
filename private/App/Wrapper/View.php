<?php

/**
 * View 1.0.0 - Created by Eko Mardiatno.
 * Copyright 2018 KOMA MVC. All Right Reserved.
 * Instagram @komafx
 * Licensed under MIT (https://github.com/ekomardiatno/koma-mvc/blob/master/LICENSE)
 */

class View
{
  private $_decryption;
  private static $_instance = null;
  private $title = '';
  private $desc = '';
  private $breadcrumb = null;
  private $layout = 'default';
  private $dir_view = 'private/App/Views/';
  private $dir_layout = 'private/App/Views/layout/';

  public function __construct()
  {
    $decryption = new Decryption;
    $this->_decryption = $decryption;
  }

  public static function getInstance()
  {

    if (!isset(self::$_instance)) {

      self::$_instance = new View;
    }

    return self::$_instance;
  }

  public function layout($file)
  {
    $this->layout = $file;
  }

  public function title($title)
  {
    $this->title = $title;
  }

  private function getTitle()
  {
    return $this->title;
  }

  public function desc($desc)
  {
    $this->desc = $desc;
  }

  private function getDesc()
  {
    if ($this->desc == '') {
      $this->desc = getenv('APP_DESC');
    }

    return $this->desc;
  }

  public function breadcrumb($breadcrumb = null)
  {
    $this->breadcrumb = $breadcrumb;
  }

  private function getBreadcrumb()
  {
    return $this->breadcrumb;
  }

  public function view($file, $data = [])
  {

    $view['title'] = $this->getTitle();
    $view['desc'] = $this->getDesc();
    $view['content'] = $this->dir_view . str_replace('.', '/', $file) . '.php';
    $view['breadcrumb'] = $this->getBreadcrumb();
    $view['page'] = $this->dir_layout . $this->layout . '.php';
    $this->_decryption->decrypted($view, $data);
    
  }
}
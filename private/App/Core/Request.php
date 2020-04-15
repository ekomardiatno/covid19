<?php

class Request extends Aes
{
  public $post = [];
  public $get = [];
  public function __construct()
  {
    if ($_POST) {
      $this->post = json_decode($this->decrypt($_POST, getenv('APP_KEY')), true);
    }

    if($_GET) {
      $this->get = $_GET;
    }
  }
}

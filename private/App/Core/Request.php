<?php

class Request extends Aes
{
  private $_license;
  private $_key = '';
  public $post = [];
  public function __construct($_key)
  {
    $this->_key = $_key;
    $this->_license = new License($this->_key);
    if ($_POST) {
      $this->post = $_POST;
      if($this->_license->is_valid()) {
        $this->post = json_decode($this->decrypt($_POST, $this->_key));
      }
    }
  }
}

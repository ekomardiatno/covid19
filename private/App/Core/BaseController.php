<?php

class BaseController extends Aes
{
  private $_key = '';
  public function __construct()
  {
    if($_POST) {
      if(isset($_POST['_key'])){
        $this->_key = $_POST['_key'];
        unset($_POST['_key']);
      }
      $_POST = $this->encrypt(json_encode($_POST), $this->_key);
    }
    
  }
  
  protected function data()
  {
    return new Request($this->_key);
  }

}
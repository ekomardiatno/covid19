<?php

class License
{
  private $_method = 'aes-256-cbc';
  private $_hint;
  private $_key;
  private $_hosted;
  public function __construct()
  {
    $this->_key = getenv('APP_KEY');
    $this->_hint = [getenv('APP_NAME'), getenv('APP_AUTHOR'), getenv('APP_PASSWORD')];
    $this->_hosted = $_SERVER['HTTP_HOST'];
  }
  public function verified($type = 'ROUTE')
  {
    $iv = $this->iv();
    $chipertext = $this->chipertext();
    $password_hash = $this->password_hash();
    $plaintext = openssl_decrypt(base64_decode($chipertext), $this->_method, $password_hash, 0, $iv);
    switch($type) {
      case 'ROUTE':
        return $plaintext && $this->_hosted && strpos(getenv('APP_URL'), $plaintext) > -1 ? 
        new Route : require_once('private/App/Views/error/unverified.php');
      default:
        return $plaintext && $this->_hosted && strpos(getenv('APP_URL'), $plaintext) > -1 ? true : false;
    }
    require_once('private/App/Views/error/unverified.php');
  }
  private function password_hash()
  {
    return hash('sha256', serialize($this->_hint), true);
  }
  private function iv()
  {
    $ivlen = openssl_cipher_iv_length($this->_method);
    $hex = substr($this->_key, 0, $ivlen * 2);
    $iv = hex2bin($hex);
    return $iv;
  }
  private function chipertext()
  {
    $ivlen = openssl_cipher_iv_length($this->_method);
    return substr($this->_key, $ivlen * 2);
  }
}
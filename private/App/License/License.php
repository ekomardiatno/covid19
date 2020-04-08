<?php

class License
{
  private $_method = 'aes-256-cbc';
  private $_password;
  private $_key;
  private $_hosted;
  public function __construct($key = null)
  {
    if($key !== null) {
      $this->_key = $key;
    } else {
      $this->_key = getenv('APP_KEY');
    }
    $this->_password = getenv('APP_PASSWORD');
  }
  public function validate($key = null)
  {
    $app = $this->holder();
    return new App($app);
  }
  private function hash()
  {
    return hash('sha256', $this->_password, true);
  }
  public function holder()
  {
    $iv = $this->iv();
    $chipertext = $this->chipertext();
    $hash = $this->hash();
    $plaintext = openssl_decrypt(base64_decode($chipertext), $this->_method, $hash, 0, $iv);
    $app = explode('//', $plaintext);
    return $app;
  }
  public function is_valid()
  {
    $app = $this->holder();
    if (count($app) > 1) {
      $now = date_create(date('Y-m-d'));
      $expired = date_create(end($app));
      $diff = date_diff($now, $expired);
      $diff = intval($diff->format("%R%a"));
      if ($diff < 0) {
        return false;
      } else {
        array_pop($app);
        foreach ($app as $i => $a) {
          switch ($i) {
            case 0:
              $i = $_SERVER['HTTP_HOST'];
              break;
            case 1:
              $i = getenv('APP_NAME');
              break;
            case 2:
              $i = getenv('APP_AUTHOR');
              break;
          }
          if ($a !== $i) {
            return false;
            break;
          }
        }
      }
      return true;
    } else {
      return false;
    }
  }
  private function iv()
  {
    $ivlen = openssl_cipher_iv_length($this->_method);
    $hex = substr($this->_key, 0, $ivlen * 2);
    $iv = hex2bin($hex);
    if ($iv) {
      return $iv;
    }
    return null;
  }
  private function chipertext()
  {
    $ivlen = openssl_cipher_iv_length($this->_method);
    return substr($this->_key, $ivlen * 2);
  }
}

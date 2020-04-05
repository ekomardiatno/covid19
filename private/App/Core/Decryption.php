<?php

/**
 * Decryption 0.0.1 - Created by Eko Mardiatno.
 * Copyright 2018 KOMA MVC. All Right Reserved.
 * Instagram @komafx
 * Licensed under MIT (https://github.com/ekomardiatno/koma-mvc/blob/master/LICENSE)
 */

class Decryption
{
  private $_params;
  private $_app_key;
  private $_method = 'aes-256-cbc';
  public function __construct()
  {
    $this->_params = [getenv('APP_NAME'), getenv('APP_AUTHOR'), getenv('APP_PASSWORD')];
    $this->_app_key = getenv('APP_KEY');
  }

  public function decrypted($var = null, $data = [])
  {
    $password = $this->password_hash();
    $decrypted = $this->decrypting($password);
    switch (gettype($var)) {
      case 'NULL':
        return $decrypted === $_SERVER['HTTP_HOST'] ? true : false;
      case 'array':
        if (isset($var['page'])) {
          extract($var);
          return $decrypted === $_SERVER['HTTP_HOST'] ? require_once($page) : require_once('private/App/Views/error/encrypted.php');
        } else {
          return $decrypted === $_SERVER['HTTP_HOST'] ? $var : [];
        }
      case 'string':
        return $decrypted === $_SERVER['HTTP_HOST'] ? $var : '';
      case 'integer':
        return $decrypted === $_SERVER['HTTP_HOST'] ? $var : 0;
      case 'double':
        return $decrypted === $_SERVER['HTTP_HOST'] ? $var : 0;
      case 'boolean':
        return $decrypted === $_SERVER['HTTP_HOST'] ? $var : false;
    }
  }

  private function password_hash()
  {
    return hash('sha256', serialize($this->_params), true);
  }

  private function decrypting($password)
  {
    $ivlen = openssl_cipher_iv_length($this->_method);
    $hex = substr($this->_app_key, 0, $ivlen * 2);
    $encrypted = substr($this->_app_key, ($ivlen * 2));
    $iv = hex2bin($hex);
    return openssl_decrypt(base64_decode($encrypted), $this->_method, $password, 0, $iv);
  }
}

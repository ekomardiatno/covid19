<?php

class AesController extends Controller
{

  public function index()
  {
    $_methods = openssl_get_cipher_methods();
    $_get_methods = [];
    foreach($_methods as $m) {
      if(openssl_cipher_iv_length($m) === 16) {
        $_get_methods[] = $m;
      }
    }

    echo json_encode($_get_methods);
  }
}

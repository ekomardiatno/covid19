<?php

class AesController extends Controller
{

  public function encrypt()
  {
    $plaintext = "message to be encrypted";
    $cipher = "aes-128-gcm";
    if (in_array($cipher, openssl_get_cipher_methods())) {
      $ivlen = openssl_cipher_iv_length($cipher);
      $iv = openssl_random_pseudo_bytes($ivlen);
      $key = hash('sha256', 'Rahasia', true);
      $ciphertext = openssl_encrypt($plaintext, $cipher, $key, 0, $iv, $tag);
      $hexTag = bin2hex($tag);
      echo $ivlen;
      var_dump($tag);
      var_dump($hexTag);
      var_dump(hex2bin($hexTag));
      //store $cipher, $iv, and $tag for decryption later
      // $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, 0, $iv, $tag);
      // echo $original_plaintext . "\n";
    }
  }
}

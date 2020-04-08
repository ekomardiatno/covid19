<?php

class App
{
  public function __construct($app)
  {
    $now = date_create(date('Y-m-d'));
    $expired = date_create(end($app));
    $diff = date_diff($now, $expired);
    $diff = intval($diff->format("%R%a"));

    if (count($app) > 1) {
      if ($diff < 0) {
        require_once(__DIR__ . './Views/error/expired.php');
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
            require_once(__DIR__ . './Views/error/unvalid.php');
            break;
          }
        }
      }
    } else {
      require_once(__DIR__ . './Views/error/unvalid.php');
    }
  }
  public function Route()
  {
    return new Route;
  }
}
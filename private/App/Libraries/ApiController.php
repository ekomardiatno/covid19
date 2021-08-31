<?php

class ApiController extends Controller
{

  public $_method = 'GET';
  public function __construct()
  {
    parent::__construct();
    $aes = Aes::getInstance();
    $password = '@):/-absc';
    $headers = apache_request_headers();
    $decrypting_key = $aes->decrypt($headers['Token-Key'] ?? '', $password);
    $client = unserialize($decrypting_key);
    $now = date('Y-m-d');
    $target = $client['validate_date'];
    if (!isset($target)) {
      $this->sendOutput(
        json_encode(['status' => 401, 'msg' => 'Unauthorized Token']),
        ['Content-Type: application/json', 'HTTP/1.1 401 Unauthorized']
      );
    }
    $expired_in = (strtotime($target) - strtotime($now)) / (60 * 60 * 24);
    if ($expired_in < 0) {
      $this->sendOutput(
        json_encode(['status' => 401, 'msg' => 'Token has expired']),
        ['Content-Type: application/json', 'HTTP/1.1 401 Unauthorized']
      );
    }
  }

  public function set_method($method)
  {
    $this->_method = 'GET';
  }

  public function response($data, $status = 'HTTP/1.1 200 OK')
  {
    if ($_SERVER['REQUEST_METHOD'] !== $this->_method) {
      $strErrorDesc = 'Method not correct';
      $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
      $this->sendOutput(
        json_encode(['status' => 422, 'msg' => $strErrorDesc]),
        ['Content-Type: application/json', $strErrorHeader]
      );
    }

    $this->sendOutput(
      json_encode($data),
      ['Content-Type: application/json', $status]
    );
  }

  /**
   * Get URI elements.
   * 
   * @return array
   */
  protected function getUriSegments()
  {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode('/', $uri);

    return $uri;
  }

  /**
   * Get querystring params.
   * 
   * @return array
   */
  protected function getQueryStringParams()
  {
    return parse_str($_SERVER['QUERY_STRING'], $query);
  }

  /**
   * Send API output.
   *
   * @param mixed  $data
   * @param string $httpHeader
   */
  protected function sendOutput($data, $httpHeaders = array())
  {

    header_remove('Set-Cookie');

    if (is_array($httpHeaders) && count($httpHeaders)) {
      foreach ($httpHeaders as $httpHeader) {
        header($httpHeader);
      }
    }

    echo $data;
    exit;
  }
}

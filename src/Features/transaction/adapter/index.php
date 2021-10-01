<?php

namespace transaction\adapter;

require_once(__DIR__ . '/../../../services/index.php');
require_once(__DIR__ . '/interface.php');

use services\Services;

class TransactionAdapter implements ITransactionAdapter {
  
  /**
   * Need config to instance correctly
   * 
   * @param Object config - an object with environment and apiKey.
   */
  function __construct($config) {
    $this->config = $config;
  }

  public function sendSignedTransaction($signedTransaction, $protocol) {
    $services = new Services($this->config);
    $url = "/transaction?protocol=". $protocol;
    return $services->post($url, $signedTransaction);
  }
}
?>
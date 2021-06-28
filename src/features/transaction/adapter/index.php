<?php

namespace transaction\adapter;

require(__DIR__ . '/../../../services/index.php');
require(__DIR__ . '/interface.php');

use services\Services;

class TransactionAdapter implements ITransactionAdapter {
  
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
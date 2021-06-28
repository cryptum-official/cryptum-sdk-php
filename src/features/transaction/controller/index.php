<?php
namespace transaction\controller;

require(__DIR__ . '/../adapter/index.php');
require(__DIR__ . '/interface.php');

use transaction\adapter\TransactionAdapter;
use transaction\controller\ITransactionController;

/**
 * TransactionController to manipulate and send signed transactions
 */
class TransactionController implements ITransactionController {
  
  function __construct($config) {
    $this->config = $config;
  }

  function sendSignedTransaction($signedTransaction, $protocol) {
    $adapter =  new TransactionAdapter($this->config);
    return $adapter->sendSignedTransaction($signedTransaction, $protocol);
  }
}
?> 
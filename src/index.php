<?php

require(__DIR__ . '/features/transaction/controller/index.php');

use transaction\controller\TransactionController;

/**
 * Cryptum SDK
 */
class CryptumSDK {
	private $config;
  
  function __construct($config) {
    $this->config = $config;
  }

  function getTransactionController() {
    return new TransactionController($this->config);
  }
}
?> 
<?php
namespace Cryptum;

use Cryptum\Features\Controllers\PricesController;
use Cryptum\Features\Controllers\SwapController;
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


  /**
   * Method to get a controller to manipulate prices
   *
   * @returns PricesController instance
   */
  function getPricesController() {
    return new PricesController($this->config);
  }

  function getSwapController(){
    return new SwapController($this->config);
  }
}
?> 
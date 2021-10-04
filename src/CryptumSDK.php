<?php
namespace Cryptum;

use Cryptum\Features\Controllers\PricesController;
use Cryptum\Features\Controllers\SwapController;
use Cryptum\Features\Controllers\WebhookController;
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
   * @return PricesController
   */
  function getPricesController() {
    return new PricesController($this->config);
  }


  /**
   * Method to get a controller to manipulate swap
   *
   * @return SwapController
   */
  function getSwapController(){
    return new SwapController($this->config);
  }

  /**
   * Method to get a controller to manipulate webhooks
   *
   * @return WebhookController
   */  
  function getWebookController() {
    return new WebhookController($this->config);
  }
}
?> 
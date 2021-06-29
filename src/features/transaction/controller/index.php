<?php
namespace transaction\controller;

require_once(__DIR__ . '/../adapter/index.php');
require_once(__DIR__ . '/../use-cases/index.php');
require_once(__DIR__ . '/interface.php');

use transaction\usecases\TransactionUseCase;
use transaction\adapter\TransactionAdapter;
use transaction\controller\ITransactionController;

/**
 * TransactionController to manipulate and send signed transactions
 */
class TransactionController implements ITransactionController {
  
  function __construct($config) {
    $this->config = $config;
  }

  function sendSignedTransaction(string $signedTx, string $type , string $protocol) {
    $adapter =  new TransactionAdapter($this->config);
    $useCase = new TransactionUseCase();
    $transaction = $useCase->mountToSendSignedTransaction($signedTx, $type);

    $cryptumResponse = $adapter->sendSignedTransaction($transaction, $protocol);
    $transaction->setHash($cryptumResponse->hash);

    return $transaction;
  }
}
?> 
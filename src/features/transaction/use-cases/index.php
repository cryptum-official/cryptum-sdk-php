<?php
namespace transaction\usecases;

require_once(__DIR__ . '/../entity/index.php');
require_once(__DIR__ . '/interface.php');

use transaction\entity\SignedTransactionCryptum;
use transaction\usecases\ITransactionUseCase;

class TransactionUseCase implements ITransactionUseCase {

  /**
   * Method to mount mount to send an signed transaction
   */
  public function mountToSendSignedTransaction(string $signedTx, string $type) {
    return new SignedTransactionCryptum($signedTx, $type);
  }
}
?>
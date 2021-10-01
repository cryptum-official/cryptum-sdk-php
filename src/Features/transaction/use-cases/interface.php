<?php
namespace transaction\usecases;
interface ITransactionUseCase {

  /**
   * Method to mount mount to send an signed transaction
   */
  public function mountToSendSignedTransaction(string $signedTx, string $type);
}
?>
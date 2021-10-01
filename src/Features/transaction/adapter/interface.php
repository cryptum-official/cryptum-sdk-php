<?php
namespace transaction\adapter;

interface ITransactionAdapter {
  
  /**
   * Method to send an signed transaction to cryptum.
   * 
   * @param Object signedTransaction - object with signedTx, and type transaction
   * @param Object protocol - transaction protocol. ps: STELLAR, BITCOIN..
   */
  public function sendSignedTransaction($signedTransaction, $protocol);
}
?>
<?php
namespace transaction\adapter;

interface ITransactionAdapter {
  
  public function sendSignedTransaction($signedTransaction, $protocol);
}
?>
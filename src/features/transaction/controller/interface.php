<?php
namespace transaction\controller;

interface ITransactionController {

  public function sendSignedTransaction($signedTransaction, $protocol);
}
?>
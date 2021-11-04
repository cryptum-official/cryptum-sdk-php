<?php
namespace transaction\controller;

interface ITransactionController {

  public function sendSignedTransaction(string $signedTransactionBlob, string $type , string $protocol);
}
?>
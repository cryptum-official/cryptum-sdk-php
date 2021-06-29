<?php
namespace transaction\entity;

use Exception;

class SignedTransactionCryptum {
  
  function __construct($signedTx, $type) {
    $isValid = $this->validateSignedTransactionType($type);
    if(!$isValid) throw new Exception("Type is not accepted verify if your type is: TRANSFER | CALL_CONTRACT_METHOD | DEPLOY_CONTRACT | CHANGE_TRUST");
  
    $this->signedTx = $signedTx;
    $this->type = $type;
  }

  private function validateSignedTransactionType($type): bool {
    $validTypes = ["TRANSFER", "CALL_CONTRACT_METHOD", "DEPLOY_CONTRACT", "CHANGE_TRUST"];
    foreach ($validTypes as $validType) {
      if($validType == $type) return true;
    }

    return false;
  }

  /**
   * Method to set an hash by Cryptum Response 
   */
  public function setHash(string $hash) : void {
    if($hash == null) throw new Exception("Cryptum response fail, hash cannot be null");
    $this->hash = $hash;
  }
}
?> 
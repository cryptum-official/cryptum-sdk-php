<?php
require_once(__DIR__ . '/../../../src/features/transaction/entity/index.php');

use PHPUnit\Framework\TestCase;
use transaction\entity\SignedTransactionCryptum;


class SignedTransactionCryptumTest extends TestCase
{
    public function testCreateValidSignedTransaction()
    {
        $signedTx = "sample";
        $type = "TRANSFER";
        $transaction = new SignedTransactionCryptum($signedTx, $type);
        $this->assertEquals($signedTx, $transaction->signedTx);
        $this->assertEquals($type, $transaction->type);
    }

    public function testSetHashSignedTransaction()
    {
        $signedTx = "sample";
        $type = "TRANSFER";
        $hash = "samplehaseihfdas";

        $transaction = new SignedTransactionCryptum($signedTx, $type);
        $transaction->setHash($hash);

        $this->assertEquals($signedTx, $transaction->signedTx);
        $this->assertEquals($type, $transaction->type);
        $this->assertEquals($hash, $transaction->hash);
    }


    public function testCreateSignedTransactionWithInvalidType()
    {
        $signedTx = "sample";
        $type = "INVALID";
        $expectedResult = "Type is not accepted verify if your type is: TRANSFER | CALL_CONTRACT_METHOD | DEPLOY_CONTRACT | CHANGE_TRUST";

        try {
            new SignedTransactionCryptum($signedTx, $type);
        } catch (\Exception $e) {
            $this->assertEquals($expectedResult, $e->getMessage());
        }
    }
}
?>
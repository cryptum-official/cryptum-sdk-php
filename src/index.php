<?php

require(__DIR__ . '/features/transaction/controller/index.php');

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
}

$config = new stdClass();
$config->environment = "development";
$config->apiKey = "QBtX081m3136XMwVIbSGupZmPaL1AEIh1azjgp5DUA2ssGwrhcrCZkPtH3c82E7fA3iJXwgnS221dQaldJP1IHnJef563wuHaI9VreszVznZ0BOpvgMlwbceKEAvoq0zIdA";

$protocol = "STELLAR";
$blob = "AAAAAgAAAQAAAAAAAAAAAAWq/YZkzd+XKkyvGWeEQNeohKjFb5Syac63q78woKeKAAAAZAAAJHIAAAAJAAAAAQAAAAAAAAAAAAAAAGDY6SoAAAAAAAAAAQAAAAAAAAAFAAAAAAAAAAAAAAABAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABMKCnigAAAEChbH0UO2177/zjxS6f+nNYUuvTRvSDtrwgG8F/WBKAHHoT4MTFIGUFmOmDh3oGu7C/ODkaJ0MKS59B537Iv4wD";
$type = "TRANSFER";

$sdk = new CryptumSDK($config);
$controller = $sdk->getTransactionController();
var_dump($controller->sendSignedTransaction($blob, $type, $protocol));
?> 
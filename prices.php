<?php

use Cryptum\Features\Controllers\SwapController;

require_once realpath("vendor/autoload.php");

$config = new stdClass();


$config->environment = "development"; // or production
$config->apiKey = "FJEJZCX-DAAMA8H-NNR86FG-S7K723E";


$cryptumSdk = new Cryptum\CryptumSDK($config);

$getPricesController = $cryptumSdk->getPricesController();

$prices = $getPricesController->getPrices('CELO');

print_r($prices);


$swapController = new SwapController($config);

$suportedCurrencies = $swapController->getSupportedCurrencies();

print_r($suportedCurrencies);
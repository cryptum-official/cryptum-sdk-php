# Prices

List currency price quotations in realtime.

Possible tokens are: XLM, XRP, BTC, ETH, CELO, BNB, MDA, HTR.

```php
$sdk = new CryptumSDK($config);

$pricesController = $sdk->getPricesController();
$prices = $pricesController->getPrices('XLM');

print_r($prices);

// stdClass Object
// (
//     [BRL] => 33.378160301237
//     [USD] => 6.205
//     [EUR] => 5.345
//     [BTC] => 0.00012985561645946
//     [ETH] => 0.001900267354295
//     [XLM] => 20.934547908232
//     [XRP] => 6.0477582846004
//     [BNB] => 0.014896528544678
//     [MDA] => 9.125
//     [CELO] => 1
//     [HTR] => 8.9551161783807
// )
```

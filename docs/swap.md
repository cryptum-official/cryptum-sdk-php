# Swap

  - [Get supported currencies](#get-supported-currencies)
  - [Get minimum amount](#get-minimum-amount)
  - [Get estimate amount](#get-estimate-amount)
  - [Get order](#get-order)
  - [Create order](#create-order)
  - [Get orders](#get-orders)

First create an instance of swap controller to call all methods below.

```php
$swapController = $sdk.getSwapController()
```

## Get supported currencies
Get a list of all supported currencies to swap from and to. Examples: BTC, ETH, XLM, XRP, BNB, USDT and others.

Examples:

```php

$swapController.getSupportedCurrencies();
```

## Get minimum amount
Get the minimum amount to swap.

### `$swapController.getMinimumAmount($opts)`
Params:
* `$opts['currencyFrom']` (string) (__required__) criptocurrency to swap from.
* `$opts['currencyTo']` (string) (__required__) criptocurrency to swap to.

Examples:

```php
$opts = [
    'currencyFrom' => 'BTC',
    'currencyTo' => 'ETH'
];

$swapController.getMinimumAmount($opts);
```

## Get estimate amount
Get estimate amount to receive from the swap.

### `$swapController.getEstimateAmount(opts);`
Params:
* `$opts['currencyFrom']` (string) (__required__) criptocurrency to swap from.
* `$opts['currencyTo']` (string) (__required__) criptocurrency to swap to.
* `$opts['amount']` (string) (__required__) criptocurrency amount to estimate.

Examples:

```php
$opts = [
    'currencyFrom' => 'BTC',
    'currencyTo' => 'ETH',
    'amount' = '0.1'
];

$swapController.getEstimateAmount($opts);
```
## Get order
Get the swap order by its id.

### `$swapController.getOrder(id);`
Params:
* `id` (string) (__required__) swap order id.

Example:
```php
$id = '41c62023-ec12-4d5c-8ea3-b1b93a4d63ac';

$swapController.getOrder($id);
```

## Create order
Create new swap order.

### `$swapController.createOrder(opts);`
Params:
* `$opts['currencyFrom']` (string) (__required__) currency to swap from
* `$opts['currencyTo']` (string) (__required__) currency to swap to
* `$opts['amount']` (string) (__required__) amount to swap from
* `$opts['addressTo']` (string) (__required__) address to swap to
* `$opts['memoTo']` (string) memo or extra id string to pass along with the addressTo (only for some currencies like XLM, XRP, etc)
* `$opts['refundAddress']` (string) (__required__) address to return funds to the user in case the swapping goes wrong
* `$opts['refundMemo']` (string) (__required__) memo or extra id string to pass along with the refundAddress (only for some currencies like XLM, XRP, etc)

Example:
```php
$opts = [
    'currencyFrom' => "SOL",
    'currencyTo' => "ETH",
    'amountFrom' => "5.81",
    'addressTo' => "0x0Cbed4D3f2...d8b1A7B5185",
    'memoTo' => null,
    'refundAddress' => null,
    'refundMemo' => null
  ]

$swapController.createOrder($opts);
```

## Get orders
Get all swap orders.

### `swapController.getOrders(opts);`
Params:
* `$opts['limit']` (number) (__required__)
* `$opts['offset']` (number) (__required__)

Example
```php
$opts = [
   'limit' => 10,
   'offset' => 1
];

$swapController.getOrders($opts);
```
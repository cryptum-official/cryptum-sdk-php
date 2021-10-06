# Webhooks

## Create a Webhook

You need only instantiate Webhook controller and send your webhook to cryptum 🚀

```php
$webhookController = $sdk->getWebookController();

$protocol = "ETHEREUM";

$opts = [
  'asset' => 'ETH',
  'url' => 'https://site.com',
  'address' => '0x0c99adab65a55df5faf53ab923f43d9eb9368772',
  'confirmations'=> 6,
  'protocol' => 'ETHEREUM'  
];

$webhook = $webhookController->createWebhook($opts, $protocol);
print_r($webhook);
```

ps.: If you not provide an WebhookCryptum valid, the Cryptum sdk return an exception.

## List you Webhooks

You need only instantiate Webhook controller and your protocol to cryptum 🚀

```php
$webhookController = $sdk->getWebookController();

$args = [
    'protocol' => 'BITCOIN',
    // 'asset' => 'BTC'
];
$webhooks = $webhookController->getWebhooks($args);
print_r($webhooks);
```

ps.: If you not provide an asset or protocol valid, the Cryptum sdk return an exception.

## Delete a Webhook

You need only instantiate Webhook controller and send your asset, protocol and webhookId to cryptum 🚀

```php
$webhookController = $sdk->getWebookController();

$args = [
    'asset' => 'ETH', 
    'protocol' => "ETHEREUM",
    'webhookId' => '88f19287-884b-43bd-bdcc-3db5a501fb24'
];

$webhooks = $webhookController->deleteWebhook($args);
print_r($webhooks);
```

ps.: If you don't provide an protocol and webhookId valid, the Cryptum sdk return an exception.

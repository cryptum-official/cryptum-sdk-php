# Webhooks

## Create a Webhook

You need only instantiate Webhook controller and send your webhook to cryptum 🚀

```php
$webhookController = $sdk.getWebhooksController();

$opts = [
  'asset' => 'ETH',
  'url' => 'https://site.com',
  'address' => '0x0c99adab65a55df5faf53ab923f43d9eb9368772',
  'confirmations'=> 6,
  'protocol' => 'ETHEREUM'  
];

$webhook = $webhookController.createWebhook($opts);
print_r($webhook);
// Log your WebhookCryptum
```

ps.: If you not provide an WebhookCryptum valid, the Cryptum sdk return an exception.

## List you Webhooks

You need only instantiate Webhook controller and your protocol to cryptum 🚀

```php
$webhookController = $sdk.getWebhooksController();

$protocol = 'BITCOIN';

$webhooks = $webhookController.getWebhooks($protocol);
print_r(webhooks);
// Log your WebhookCryptum list
```

ps.: If you not provide an asset or protocol valid, the Cryptum sdk return an exception.

## Delete a Webhook

You need only instantiate Webhook controller and send your asset, protocol and webhookId to cryptum 🚀

```php
$webhookController = $sdk.getWebhooksController();

$opts = [
  'protocol' => 'BITCOIN',
  'webhookId' => 'ba291cc3-1e29-4c70-b716-b4185891c569'
];

$webhooks = $webhookController.destroyWebhook($opts);
```

ps.: If you don't provide an asset, protocol and webhookId valid, the Cryptum sdk return an exception.

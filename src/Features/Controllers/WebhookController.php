<?php

namespace Cryptum\Features\Controllers;

use Cryptum\Services\Services;
use Cryptum\Services\Validations\WebhookValidations;

class WebhookController
{
    private $services = null;
    private $event = 'tx-confirmation';

    function __construct($config)
    {
        $this->services = new Services($config);
    }

    /**
     * Method to create an webhook in Cryptum
     * 
     * @param array $asset['url', 'address', 'confirmations', 'asset']
     */
    function createWebhook(array $asset, string $protocol)
    {
        try {
            $asset['event'] = $this->event;
            WebhookValidations::fielsCreateWebhook($asset);
            return $this->services->post("/webhook?protocol=" . $protocol, $asset);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    /**
     * Method to get webhooks of the Cryptum
     *
     * @param array asset to get respective webhooks
     */
    function getWebhooks(array $asset)
    {
        try {
            WebhookValidations::fielsGetWebhook($asset);
            return  $this->services->get("/webhook?" . http_build_query($asset));
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    function deleteWebhook(array $webhook){
        try {
            return $this->services->delete("/webhook/" . $webhook['asset'] . "/" . $webhook['webhookId'] . '?protocol=' . $webhook['protocol'], []);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

}

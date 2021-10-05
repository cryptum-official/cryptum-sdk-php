<?php

namespace Cryptum\Features\Controllers;

use Cryptum\Services\Services;

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
    function createWebhook(array $asset)
    {
        try {
            $webhook['event'] = $this->event;
            return $this->services->post("/webhook", $asset);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    /**
     * Method to get webhooks of the Cryptum
     *
     * @param string asset asset to get respective webhooks
     * @param string protocol protocol to get yours webhooks
     */
    function getWebhooks(string $asset, string $protocol)
    {
        try {

            $query = [
                'asset' => $asset,
                'protocol' => $protocol
            ];
            return  $this->services->get("/webhook?" . http_build_query($query));
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }


    
}

<?php

namespace Cryptum\Features\Controllers;

use Cryptum\Services\Services;

class PricesController
{

    private $config = null;

    function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Async method to retrieve prices of the given asset
     * @param string $asset
     */
    function getPrices($asset)
    {
        $services = new Services($this->config);
        return $services->get("/prices/".$asset);

    }
}

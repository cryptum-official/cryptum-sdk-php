<?php

namespace Cryptum\Features\Controllers;

use Cryptum\Services\Services;

class PricesController
{

    private $services = null;

    function __construct($config)
    {
        $this->services = new Services($config);
    }

    /**
     * Retrieve prices of the given asset
     * @param string $asset
     */
    function getPrices(string $asset)
    {
        try {
            return $this->services->get("/prices/" . $asset);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}

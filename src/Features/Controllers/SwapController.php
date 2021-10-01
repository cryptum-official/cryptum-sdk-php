<?php

namespace Cryptum\Features\Controllers;

use Cryptum\Services\Services;

class SwapController
{

    private $config = null;

    function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * 
     */
    function getSupportedCurrencies()
    {
        $services = new Services($this->config);
        $url = "/swap/currencies";

        try {
            $currencies = $services->get($url);
            return $currencies;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    
}

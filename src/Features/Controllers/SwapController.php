<?php

namespace Cryptum\Features\Controllers;

use Cryptum\Services\Services;

class SwapController
{

    private $services = null;

    function __construct($config)
    {
        $this->services = new Services($config);
    }

    /**
     * Get a list of all supported currencies to swap from and to. Examples: BTC, ETH, XLM, XRP, BNB, USDT and others.
     */
    function getSupportedCurrencies()
    {
        try {
            $currencies = $this->services->get("/swap/currencies");
            return $currencies;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    /**
     * Get the minimum amount to swap from currency.
     * @param array $currency['currencyFrom', 'currencyTo']
     */
    function getMinimumAmount(array $currency)
    {
        try {
            $minimun = $this->services->get("/swap/currencies/min-amount?" . http_build_query($currency));
            return $minimun;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    /**
     * Get estimate amount to receive from the swap.
     * @param array $currencies['currencyFrom', 'currencyTo', 'amount']
     */
    function getEstimateAmount(array $currencies)
    {
        try {
            $estimate = $this->services->get("/swap/currencies/estimate-amount?" . http_build_query($currencies));
            return $estimate;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }


    /**
     * Get the swap order by its id.
     * @param string $id
     */
    function getOrder(string $id)
    {
        try {
            $order = $this->services->get("/swap/orders/".$id);
            return $order;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    /**
     * Create new swap order.
     * @param array $order['currencyFrom', 'currencyTo', 'amountFrom', 'addressTo', 'memoTo', 'refundAddress', 'refundMemo']
     */
    function createOrder(array $order)
    {
        try {
            $order = $this->services->post("/swap/orders", $order);
            return $order;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    /**
     * Get all swap orders.
     * @param array $args['limit', 'offset']
     */
    function getOrders(array $args)
    {
        try {
            $orders = $this->services->get("/swap/orders?" . http_build_query($args));
            return $orders;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}

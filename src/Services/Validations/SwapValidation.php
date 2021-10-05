<?php

namespace Cryptum\Services\Validations;

use Cryptum\Services\Helpers\Validator;

class SwapValidation
{
    /**
     * 
     */
    static function fieldsMinimumAmount(array $currency)
    {
        Validator::is_required($currency, 'currencyFrom');
        Validator::is_string('currencyFrom', $currency['currencyFrom']);
        Validator::is_required($currency, 'currencyTo');
        Validator::is_string('currencyTo', $currency['currencyTo']);
    }

    /**
     * 
     */
    static function fiedsEstimateAmount(array $currencies)
    {
        self::fieldsMinimumAmount($currencies);
        Validator::is_required($currencies, 'amount');
        Validator::is_float('amount', $currencies['amount']);
    }

    /**
     * Validate fields to create new swap order.
     * @param array $order['currencyFrom', 'currencyTo', 'amountFrom', 'addressTo', 'memoTo', 'refundAddress', 'refundMemo']
     */
    static function fieldsCreateOrder(array $order)
    {

        self::fieldsMinimumAmount($order);
        Validator::is_required($order, 'amountFrom');
        Validator::is_string('amountFrom', $order['amountFrom']);
        Validator::is_required($order, 'addressTo');
        Validator::is_string('addressTo', $order['addressTo']);

        if (array_key_exists('memoTo', $order)) {
            Validator::is_string('memoTo', $order['memoTo']);
        }
        if (array_key_exists('refundAddress', $order)) {
            Validator::is_string('refundAddress', $order['refundAddress']);
        }
        if (array_key_exists('refundMemo', $order)) {
            Validator::is_string('refundMemo', $order['refundMemo']);
        }
    }

    static function filedsOrders(array $args)
    {
        Validator::is_required($args, 'limit');
        Validator::is_int('limit', $args['limit']);
        Validator::is_required($args, 'offset');
        Validator::is_int('offset', $args['offset']);
    }
}

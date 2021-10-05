<?php

namespace Cryptum\Services\Validations;

use Respect\Validation\Validator;

class SwapValidation
{
    /**
     * 
     */
    static function fieldsMinimumAmount(array $currency)
    {
        if (array_key_exists('currencyFrom', $currency)) {
            if (is_string($currency['currencyFrom'])) {
                throw new \Exception('currencyFrom must be string type');
            }
        } else {
            throw new \Exception('`currencyFrom` is a required field');
        }
        if (array_key_exists('currencyTo', $currency)) {
            if (Validator::keySet(Validator::key('currencyTo', Validator::stringType()))->validate($currency)) {
                throw new \Exception('currencyTo must be string type');
            }
        } else {
            throw new \Exception('`currencyTo` is a required field');
        }
    }

    /**
     * 
     */
    static function fiedsEstimateAmount(array $currencies)
    {
        if (array_key_exists('currencyFrom', $currencies)) {
            if (Validator::keySet(Validator::key('currencyFrom', Validator::stringType()))->validate($currencies)) {
                throw new \Exception('currencies must be string type');
            }
        } else {
            throw new \Exception('`currencyFrom` is a required field');
        }
        if (array_key_exists('currencyTo', $currencies)) {
            if (Validator::keySet(Validator::key('currencyTo', Validator::stringType()))->validate($currencies)) {
                throw new \Exception('`currencyTo` must be string type');
            }
        } else {
            throw new \Exception('`currencyTo` is a required field');
        }
        if (array_key_exists('amount', $currencies)) {
            if (Validator::keySet(Validator::key('amount', Validator::stringType()))->validate($currencies)) {
                throw new \Exception('`amount` must be string type');
            }
        } else {
            throw new \Exception('`amount` is a required field');
        }
    }

    /**
     * Validate fields to create new swap order.
     * @param array $order['currencyFrom', 'currencyTo', 'amountFrom', 'addressTo', 'memoTo', 'refundAddress', 'refundMemo']
     */
    static function fieldsCreateOrder(array $order)
    {
        if (array_key_exists('currencyFrom', $order)) {
            if (Validator::keySet(Validator::key('currencyFrom', Validator::stringType()))->validate($order)) {
                throw new \Exception('currencies must be string type');
            }
        } else {
            throw new \Exception('`currencies` is a required field');
        }
        if (array_key_exists('currencyTo', $order)) {
            if (Validator::keySet(Validator::key('currencyTo', Validator::stringType()))->validate($order)) {
                throw new \Exception('currencyTo must be string type');
            }
        } else {
            throw new \Exception('`currencyTo` is a required field');
        }
        if (array_key_exists('amountFrom', $order)) {
            if (Validator::keySet(Validator::key('amountFrom', Validator::stringType()))->validate($order)) {
                throw new \Exception('amountFrom must be string type');
            }
        } else {
            throw new \Exception('`amountFrom` is a required field');
        }
        if (array_key_exists('addressTo', $order)) {
            if (Validator::keySet(Validator::key('addressTo', Validator::stringType()))->validate($order)) {
                throw new \Exception('addressTo must be string type');
            }
        } else {
            throw new \Exception('`addressTo` is a required field');
        }
        if (array_key_exists('memoTo', $order)) {
            if (Validator::keySet(Validator::key('memoTo', Validator::stringType()))->validate($order)) {
                throw new \Exception('memoTo must be string type');
            }
        }
        if (array_key_exists('refundAddress', $order)) {
            if (Validator::keySet(Validator::key('refundAddress', Validator::stringType()))->validate($order)) {
                throw new \Exception('refundAddress must be string type');
            }
        }
        if (array_key_exists('refundMemo', $order)) {
            if (Validator::keySet(Validator::key('refundMemo', Validator::stringType()))->validate($order)) {
                throw new \Exception('refundMemo must be string type');
            }
        }                
    }

    static function filedsOrders(array $args){
        if (array_key_exists('limit', $args)) {
            if (Validator::keySet(Validator::key('limit', Validator::intType()))->validate($args)) {
                throw new \Exception('limit must be integer type');
            }
        } else {
            throw new \Exception('`limit` is a required field');
        }
        if (array_key_exists('offset', $args)) {
            if (Validator::keySet(Validator::key('offset', Validator::intType()))->validate($args)) {
                throw new \Exception('offset must be integer type');
            }
        } else {
            throw new \Exception('`offset` is a required field');
        }
    }
}

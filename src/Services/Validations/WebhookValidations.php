<?php

namespace Cryptum\Services\Validations;

class WebhookValidations
{

    static function fielsGetWebhook(array $webhook){
        Validator::is_required($webhook, 'protocol');
        Validator::is_string('asset', $webhook['asset']);
        Validator::is_int('limit', $webhook['limit']);
        Validator::is_int('offset', $webhook['offset']);
        Validator::is_string('startDate', $webhook['startDate']);
        Validator::is_string('endDate', $webhook['endDate']);
    }

    static function fielsCreateWebhook(array $webhook){
        Validator::is_required($webhook, 'event');
        Validator::is_string('event', $webhook['event']);
        Validator::is_required($webhook, 'url');
        Validator::is_string('url', $webhook['url']);
        Validator::is_required($webhook, 'asset');
        Validator::is_string('asset', $webhook['asset']);
        Validator::is_required($webhook, 'address');
        Validator::is_string('address', $webhook['address']);
        Validator::is_required($webhook, 'confirmations');
        Validator::is_int('confirmations', $webhook['confirmations']);        
    }


    static function fielsDeleteWebhook(array $webhook){
        Validator::is_required($webhook, 'protocol');
        Validator::is_string('protocol', $webhook['protocol']);
    }    
}

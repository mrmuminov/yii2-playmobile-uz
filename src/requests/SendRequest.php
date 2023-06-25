<?php

namespace mrmuminov\yii2playmobileuz\requests;

use mrmuminov\yii2playmobileuz\types\Send;

/**
 * Class SendRequest
 *
 * $brokerSend = new SendRequest();
 * $brokerSend->setContent(new Send(...));
 * $response = $brokerSend->send();
 *
 * @package mrmuminov\yii2playmobileuz\requests
 * @author MrMuminov <
 * @since 2.0.0
 *
 * @property-write Send $content
 */
class SendRequest extends BaseRequest
{
    public string $payload = '/broker-api/send';
}
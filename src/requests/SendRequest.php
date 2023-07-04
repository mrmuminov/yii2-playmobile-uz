<?php

namespace mrmuminov\yii2playmobileuz\requests;

use mrmuminov\yii2playmobileuz\types\Send;

/**
 * Class SendRequest
 * ```php
 * $broker = new SendRequest([
 *   'baseUrl' => $this->baseUrl,
 *   'username' => $this->username,
 *   'password' => $this->password,
 * ]);
 * $broker->setContent($data->serialize()->serialized);
 * $broker->send();
 * ```
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
<?php

namespace mrmuminov\yii2playmobileuz;

use mrmuminov\yii2playmobileuz\requests\SendRequest;
use mrmuminov\yii2playmobileuz\types\Send;
use yii\base\Component;

/**
 * Playmobile sms gateway component for Yii2 Framework.
 *
 * @package mrmuminov\yii2playmobileuz
 * @author MrMuminov
 * @since 2.0.0
 */
class Playmobile extends Component
{
    public string $baseUrl = 'http://91.204.239.44/';
    public string $username = '';
    public string $password = '';

    public function send(Send $data): string
    {
        $broker = new SendRequest([
            'baseUrl' => $this->baseUrl,
            'username' => $this->username,
            'password' => $this->password,
        ]);
        $broker->setContent($data->serialize()->serialized);
        return $broker->send();
    }
}

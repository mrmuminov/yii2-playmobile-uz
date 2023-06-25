<?php

namespace mrmuminov\yii2playmobileuz;

use yii\base\Component;

/**
 * Class ErrorResponse
 *
 * @package mrmuminov\yii2playmobileuz
 * @author MrMuminov <
 * @since 2.0.0
 *
 * @property string $errorMessage
 * @property string $errorCode
 */
class ErrorResponse extends Component
{
    public string $error_code;

    public string $error_message;

    public function getErrorCode(): string
    {
        return $this->error_code;
    }

    public function setErrorCode(string $error_code): void
    {
        $this->error_code = $error_code;
    }

    public function getErrorMessage(): string
    {
        return $this->error_message;
    }

    public function setErrorMessage(string $error_message): void
    {
        $this->error_message = $error_message;
    }

}
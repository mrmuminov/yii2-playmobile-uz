<?php

namespace mrmuminov\yii2playmobileuz;

/**
 * Class ErrorResponse
 *
 * @package mrmuminov\yii2playmobileuz
 * @author MrMuminov <
 * @since 2.0.0
 */
class ErrorResponse
{
    /**
     * @var string
     */
    protected $error_code;

    /**
     * @var string
     */
    protected $error_message;

    /**
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->error_code;
    }

    /**
     * @param string $error_code
     */
    public function setErrorCode(string $error_code)
    {
        $this->error_code = $error_code;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->error_message;
    }

    /**
     * @param string $error_message
     */
    public function setErrorMessage(string $error_message)
    {
        $this->error_message = $error_message;
    }

}
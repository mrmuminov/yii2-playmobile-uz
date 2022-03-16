<?php

namespace mrmuminov\yii2playmobileuz\types;

/**
 * Class Call
 *
 * @package mrmuminov\yii2playmobileuz\types
 * @author MrMuminov <
 * @since 2.0.0
 */
class Call extends BaseType implements TypeInterface
{

    /**
     * @var string
     */
    public string $originator;

    /**
     * @var int
     */
    public int $ttl;

    /**
     * @var CallContent
     */
    public CallContent $content;

    /**
     * @var int
     * Количество попыток повторного звонка. Допустимы только неотрицательные числа.
     */
    public int $retryAttempts;

    /**
     * @var int
     * Интервал, через который будет произведен повторный звонок, в миллисекундах
     */
    public int $retryTimeout;


    /**
     * @return self
     */
    public function serialize(): self
    {
        $this->serialized = json_encode([
            'originator' => $this->originator,
            'ttl' => $this->ttl,
            'content' => $this->content,
            'retry-attempts' => $this->retryAttempts,
            'retry-timeout' => $this->retryTimeout,
        ]);
        return $this;
    }

    /**
     * @param $data
     * @return self
     */
    public function unSerialize($data): self
    {
        if (isset($data['originator'])) {
            $this->originator = $data['originator'];
        }
        if (isset($data['ttl'])) {
            $this->ttl = $data['ttl'];
        }
        if (isset($data['content'])) {
            $this->content = $data['content'];
        }
        if (isset($data['retry-attempts'])) {
            $this->retryAttempts = $data['retry-attempts'];
        }
        if (isset($data['retry-timeout'])) {
            $this->retryTimeout = $data['retry-timeout'];
        }
        return $this;
    }

}
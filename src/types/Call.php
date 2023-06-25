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
     * Адрес отправителя
     */
    public ?string $originator;
    /**
     * Время жизни сообщения в секундах. По
     * истечении данного времени сообщению
     * присваивается статус expired и производится
     * отправка сообщения по альтернативному
     * каналу, если он задана
     */
    public ?int $ttl;
    /**
     * Параметры для отправки по каналу
     */
    public ?CallContent $content;
    /**
     * Количество попыток повторного звонка. Допустимы только неотрицательные числа.
     */
    public ?int $retryAttempts;

    /**
     * Интервал, через который будет произведен повторный звонок, в миллисекундах
     */
    public ?int $retryTimeout;


    /**
     * @return self
     */
    public function serialize(): self
    {
        $this->serialized = [];
        if ($this->originator) $this->serialized['originator'] = $this->originator;
        if ($this->ttl) $this->serialized['ttl'] = $this->ttl;
        if ($this->content) $this->serialized['content'] = $this->content->serialize()->serialized;
        if ($this->retryAttempts) $this->serialized['retry-attempts'] = $this->retryAttempts;
        if ($this->retryTimeout) $this->serialized['retry-timeout'] = $this->retryTimeout;
        return $this;
    }

    /**
     * @param mixed $data
     * @return self
     */
    public function unSerialize(mixed $data): self
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
<?php

namespace mrmuminov\yii2playmobileuz\types;

/**
 * Class Sms
 *
 * @package mrmuminov\yii2playmobileuz\types
 * @author MrMuminov <
 * @since 2.0.0
 */
class Sms extends BaseType implements TypeInterface
{
    public ?string $originator = null;
    public ?int $ttl = null;
    public ?SmsContent $content = null;


    public function serialize(): self
    {
        $this->serialized = [];
        if ($this->originator) $this->serialized['originator'] = $this->originator;
        if ($this->ttl) $this->serialized['ttl'] = $this->ttl;
        if ($this->content) $this->serialized['content'] = $this->content->serialize()->serialized;
        return $this;
    }

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
        return $this;
    }

}
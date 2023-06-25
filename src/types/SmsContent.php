<?php

namespace mrmuminov\yii2playmobileuz\types;

/**
 * Class SmsContent
 *
 * @package mrmuminov\yii2playmobileuz\types
 * @author MrMuminov <
 * @since 2.0.0
 */
class SmsContent extends BaseType implements TypeInterface
{

    public ?string $text = null;

    public function serialize(): self
    {
        $this->serialized = [];
        if ($this->text) $this->serialized['text'] = $this->text;
        return $this;
    }

    public function unSerialize(mixed $data): self
    {
        if (isset($data['text'])) {
            $this->text = $data['text'];
        }
        return $this;
    }

}
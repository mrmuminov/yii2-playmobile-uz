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

    /**
     * @var string
     */
    public string $text;


    /**
     * @return self
     */
    public function serialize(): self
    {
        $this->serialized = json_encode([
            'text' => $this->text,
        ]);
        return $this;
    }

    /**
     * @param $data
     * @return self
     */
    public function unSerialize($data): self
    {
        if (isset($data['text'])) {
            $this->text = $data['text'];
        }
        return $this;
    }

}
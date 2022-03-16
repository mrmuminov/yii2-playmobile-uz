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

    /**
     * @var string
     */
    public string $originator;

    /**
     * @var int
     */
    public int $ttl;

    /**
     * @var SmsContent
     */
    public SmsContent $content;


    /**
     * @return self
     */
    public function serialize(): self
    {
        $this->serialized = json_encode([
            'originator' => $this->originator,
            'ttl' => $this->ttl,
            'content' => $this->content,
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
        return $this;
    }

}
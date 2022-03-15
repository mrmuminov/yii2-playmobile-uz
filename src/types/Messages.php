<?php

namespace mrmuminov\yii2playmobileuz\types;

/**
 * Class Messages
 *
 * @package mrmuminov\yii2playmobileuz\types
 * @author MrMuminov <
 * @since 2.0.0
 */
class Messages extends BaseType implements TypeInterface
{

    /**
     * @var string
     */
    public string $text;

    /**
     * @var string
     */
    public string $recipient;

    /**
     * @var string
     */
    public string $messageId;

    /**
     * @var string
     */
    public string $templateId;

    /**
     * @var string
     */
    public string $blacklistId;

    /**
     * @var string
     */
    public string $priority;

    /**
     * @var string
     */
    public string $variables;

    /**
     * @var Timing
     */
    public Timing $timing;

    /**
     * @var Sms
     */
    public Sms $sms;

    /**
     * @var Call
     */
    public Call $call;

    /**
     * @var Messages
     */
    public Messages $messages;

    /**
     * @return self
     */
    public function serialize(): self
    {
        $this->serialized = ([
            'recipient' => $this->recipient,
            'message-id' => $this->messageId,
            'template-id' => $this->templateId,
            'blacklist-id' => $this->blacklistId,
            'priority' => $this->priority,
            'variables' => $this->variables,
            'timing' => $this->timing,
            'sms' => $this->sms,
            'call' => $this->call,
            'messages' => $this->messages,
        ]);
        return $this;
    }

    /**
     * @param $data
     * @return self
     */
    public function unSerialize($data): self
    {
        if (isset($data['recipient'])) {
            $this->recipient = $data['recipient'];
        }
        if (isset($data['message-id'])) {
            $this->messageId = $data['message-id'];
        }
        if (isset($data['template-id'])) {
            $this->templateId = $data['template-id'];
        }
        if (isset($data['blacklist-id'])) {
            $this->blacklistId = $data['blacklist-id'];
        }
        if (isset($data['priority'])) {
            $this->priority = $data['priority'];
        }
        if (isset($data['variables'])) {
            $this->variables = $data['variables'];
        }
        if (isset($data['timing'])) {
            $this->timing = $data['timing'];
        }
        if (isset($data['sms'])) {
            $this->sms = $data['sms'];
        }
        if (isset($data['call'])) {
            $this->call = $data['call'];
        }
        if (isset($data['messages'])) {
            $this->messages = $data['messages'];
        }
        return $this;
    }

}
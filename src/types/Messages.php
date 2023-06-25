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
     * Адрес получателя (как правило MSISDN), указывается строго в формате 9989xxxxxxx, без пробелов и без знака +
     */
    public ?string $recipient = null;

    /**
     * @max-length 20
     */
    public ?string $messageId = null;

    public ?string $templateId = null;

    /**
     * low      - низкий
     * normal   - обычный
     * high     - высокий
     * realtime - наивысший
     */
    public ?string $priority = null;

    public ?string $variables = null;

    public ?Timing $timing = null;

    public ?Sms $sms = null;

    public ?Call $call = null;

    public function serialize(): self
    {
        $this->serialized = [];
        if ($this->recipient) $this->serialized['recipient'] = $this->recipient;
        if ($this->messageId) $this->serialized['message-id'] = $this->messageId;
        if ($this->templateId) $this->serialized['template-id'] = $this->templateId;
        if ($this->priority) $this->serialized['priority'] = $this->priority;
        if ($this->variables) $this->serialized['variables'] = $this->variables;
        if ($this->timing) $this->serialized['timing'] = $this->timing->serialize()->serialized;
        if ($this->sms) $this->serialized['sms'] = $this->sms->serialize()->serialized;
        if ($this->call) $this->serialized['call'] = $this->call->serialize()->serialized;
        return $this;
    }

    public function unSerialize(mixed $data): self
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
        return $this;
    }

}
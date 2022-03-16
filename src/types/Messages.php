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
     * Адрес получателя (как правило MSISDN), указывается строго в формате 9989xxxxxxx, без пробелов и без знака +
     */
    public string $recipient;

    /**
     * @var string
     * @max-length 20
     */
    public string $messageId;

    /**
     * @var string
     */
    public string $templateId;

    /**
     * @var string
     * low      - низкий
     * normal   - обычный
     * high     - высокий
     * realtime - наивысший
     */
    public string $priority = 'normal';

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
     * @return self
     */
    public function serialize(): self
    {
        $this->serialized = json_encode([
            'recipient' => $this->recipient,
            'message-id' => $this->messageId,
            'template-id' => $this->templateId,
            'priority' => $this->priority,
            'variables' => $this->variables,
            'timing' => $this->timing,
            'sms' => $this->sms,
            'call' => $this->call,
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
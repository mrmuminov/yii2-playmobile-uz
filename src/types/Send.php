<?php

namespace mrmuminov\yii2playmobileuz\types;

/**
 * Class Send
 *
 * @package mrmuminov\yii2playmobileuz\types
 * @author MrMuminov <
 * @since 2.0.0
 */
class Send extends BaseType implements TypeInterface
{

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
     * @var Sms
     */
    public Sms $sms;

    /**
     * @var Call
     */
    public Call $call;

    /**
     * @var array{Messages}
     * @required
     */
    public array $messages;

    /**
     * @return self
     */
    public function serialize(): self
    {
        $this->serialized = json_encode([
            'template-id' => $this->templateId,
            'priority' => $this->priority,
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
        if (isset($data['template-id'])) {
            $this->templateId = $data['template-id'];
        }
        if (isset($data['priority'])) {
            $this->priority = $data['priority'];
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
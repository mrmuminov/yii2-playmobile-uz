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

    public ?string $templateId = null;

    /**
     * low      - низкий
     * normal   - обычный
     * high     - высокий
     * realtime - наивысший
     */
    public ?string $priority = null;

    public ?Timing $timing = null;
    public ?Sms $sms = null;

    public ?Call $call = null;

    public array $messages = [];

    public function serialize(): self
    {
        $this->serialized = [];
        if ($this->templateId) $this->serialized['template-id'] = $this->templateId;
        if ($this->priority) $this->serialized['priority'] = $this->priority;
        if ($this->timing) $this->serialized['timing'] = $this->timing?->serialize()->serialized;
        if ($this->sms) $this->serialized['sms'] = $this->sms?->serialize()->serialized;
        if ($this->call) $this->serialized['call'] = $this->call?->serialize()->serialized;
        if (!empty($this->messages)) $this->serialized['messages'] = array_map(static function ($item) {
            return $item->serialize()->serialized;
        }, $this->messages);
        return $this;
    }

    public function unSerialize(mixed $data): self
    {
        if (isset($data['template-id'])) {
            $this->templateId = $data['template-id'];
        }
        if (isset($data['priority'])) {
            $this->priority = $data['priority'];
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
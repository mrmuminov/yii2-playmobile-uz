<?php

namespace mrmuminov\yii2playmobileuz\types;

/**
 * Class CallContent
 *
 * @package mrmuminov\yii2playmobileuz\types
 * @author MrMuminov <
 * @since 2.0.0
 */
class CallContent extends BaseType implements TypeInterface
{

    public ?string $text = null;

    public ?string $menu = null;

    public ?string $file = null;

    public function serialize(): self
    {
        $this->serialized = [];
        if ($this->text) $this->serialized['text'] = $this->text;
        if ($this->menu) $this->serialized['menu'] = $this->menu;
        if ($this->file) $this->serialized['file'] = $this->file;
        return $this;
    }

    public function unSerialize(mixed $data): self
    {
        if (isset($data['text'])) {
            $this->text = $data['text'];
        }
        if (isset($data['menu'])) {
            $this->menu = $data['menu'];
        }
        if (isset($data['file'])) {
            $this->file = $data['file'];
        }
        return $this;
    }

}
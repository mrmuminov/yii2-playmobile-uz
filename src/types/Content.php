<?php

namespace mrmuminov\yii2playmobileuz\types;

/**
 * Class Content
 *
 * @package mrmuminov\yii2playmobileuz\types
 * @author MrMuminov <
 * @since 2.0.0
 */
class Content extends BaseType implements TypeInterface
{

    /**
     * @var string
     */
    public string $text;

    /**
     * @var string
     */
    public string $menu;

    /**
     * @var string
     */
    public string $file;


    /**
     * @return self
     */
    public function serialize(): self
    {
        $this->serialized = ([
            'text' => $this->text,
            'menu' => $this->menu,
            'file' => $this->file,
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
        if (isset($data['menu'])) {
            $this->menu = $data['menu'];
        }
        if (isset($data['file'])) {
            $this->file = $data['file'];
        }
        return $this;
    }

}
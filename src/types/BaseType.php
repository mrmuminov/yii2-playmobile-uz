<?php

namespace mrmuminov\yii2playmobileuz\types;

use yii\base\Component;

/**
 * Class Timing
 *
 * @package mrmuminov\yii2playmobileuz
 * @author MrMuminov <
 * @since 2.0.0
 */
class BaseType extends Component
{
    /**
     * @var string
     */
    public string $unserialized;

    /**
     * @var mixed
     */
    public $serialized;

    /**
     * @return mixed
     */
    public function getSerialized()
    {
        if ($this->serialized === null) {
            $this->serialized = json_decode($this->getUnserialized(), true);
        }
        return $this->serialized;
    }

    /**
     * @return string
     */
    public function getUnserialized(): string
    {
        return $this->unserialized;
    }

}
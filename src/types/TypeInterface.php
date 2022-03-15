<?php

namespace mrmuminov\yii2playmobileuz\types;


interface TypeInterface
{

    /**
     * @return mixed
     */
    public function serialize();

    /**
     * @param mixed $data
     * @return self
     */
    public function unSerialize($data): self;

}
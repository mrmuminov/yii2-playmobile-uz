<?php

namespace mrmuminov\yii2playmobileuz\types;


interface TypeInterface
{

    public function serialize(): self;

    public function unSerialize(mixed $data): self;

}
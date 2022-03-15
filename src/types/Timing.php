<?php

namespace mrmuminov\yii2playmobileuz\types;

/**
 * Class Timing
 *
 * @package mrmuminov\yii2playmobileuz\types
 * @author MrMuminov <
 * @since 2.0.0
 */
class Timing extends BaseType implements TypeInterface
{

    /**
     * @var string
     */
    public string $localtime;

    /**
     * @var string
     */
    public string $startDatetime;

    /**
     * @var string
     */
    public string $endDatetime;

    /**
     * @var string
     */
    public string $allowedStarttime;

    /**
     * @var string
     */
    public string $allowedEndtime;

    /**
     * @var string
     */
    public string $sendEvenly;


    /**
     * @return self
     */
    public function serialize(): self
    {
        $this->serialized = ([
            'localtime' => $this->localtime,
            'start-datetime' => $this->startDatetime,
            'end-datetime' => $this->endDatetime,
            'allowed-starttime' => $this->allowedStarttime,
            'allowed-endtime' => $this->allowedEndtime,
            'send-evenly' => $this->sendEvenly,
        ]);
        return $this;
    }

    /**
     * @param $data
     * @return self
     */
    public function unSerialize($data): self
    {
        if (isset($data['localtime'])) {
            $this->localtime = $data['localtime'];
        }
        if (isset($data['start-datetime'])) {
            $this->startDatetime = $data['start-datetime'];
        }
        if (isset($data['end-datetime'])) {
            $this->endDatetime = $data['end-datetime'];
        }
        if (isset($data['allowed-starttime'])) {
            $this->allowedStarttime = $data['allowed-starttime'];
        }
        if (isset($data['allowed-endtime'])) {
            $this->allowedEndtime = $data['allowed-endtime'];
        }
        if (isset($data['send-evenly'])) {
            $this->sendEvenly = $data['send-evenly'];
        }
        return $this;
    }

}
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
     * Отправлять по местному времени
     *  0 - получателя
     *  1 - системы
     */
    public string $localtime;

    /**
     * @var string
     * Дата начала отправки.
     * Формат YYYY-MM-DD hh:mm.
     * Если не указана, то сообщения отправляются сразу же.
     */
    public string $startDatetime;

    /**
     * @var string
     * Дата завершения отправки.
     * Формат YYYY-MMDD hh:mm.
     * Если не указана, то система не стремится отправиться все сообщения до определенного времени.
     */
    public string $endDatetime;

    /**
     * @var string
     * Время, с которого разрешена отправка.
     * Формат hh:mm
     */
    public string $allowedStarttime;

    /**
     * @var string
     * Время, до которого разрешена отправка.
     * Формат hh:mm
     */
    public string $allowedEndtime;

    /**
     * @var int
     * Равномерно распределять отправку
     *  1 - распределять
     *  0 - не распределять
     */
    public int $sendEvenly;


    /**
     * @return self
     */
    public function serialize(): self
    {
        $this->serialized = json_encode([
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
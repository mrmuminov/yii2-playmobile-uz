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
     * Отправлять по местному времени
     *  0 - получателя
     *  1 - системы
     */
    public ?string $localtime = null;

    /**
     * Дата начала отправки.
     * Формат YYYY-MM-DD hh:mm.
     * Если не указана, то сообщения отправляются сразу же.
     */
    public ?string $startDatetime = null;

    /**
     * Дата завершения отправки.
     * Формат YYYY-MM-DD hh:mm.
     * Если не указана, то система не стремится отправиться все сообщения до определенного времени.
     */
    public ?string $endDatetime = null;

    /**
     * Время, с которого разрешена отправка.
     * Формат hh:mm
     */
    public ?string $allowedStarttime = null;

    /**
     * Время, до которого разрешена отправка.
     * Формат hh:mm
     */
    public ?string $allowedEndtime = null;

    /**
     * Равномерно распределять отправку
     *  1 - распределять
     *  0 - не распределять
     */
    public ?int $sendEvenly = null;

    public function serialize(): self
    {
        $this->serialized = [];
        if ($this->localtime) $this->serialized['localtime'] = $this->localtime;
        if ($this->startDatetime) $this->serialized['start-datetime'] = $this->startDatetime;
        if ($this->endDatetime) $this->serialized['end-datetime'] = $this->endDatetime;
        if ($this->allowedStarttime) $this->serialized['allowed-starttime'] = $this->allowedStarttime;
        if ($this->allowedEndtime) $this->serialized['allowed-endtime'] = $this->allowedEndtime;
        if ($this->sendEvenly) $this->serialized['send-evenly'] = $this->sendEvenly;

        return $this;
    }

    public function unSerialize(mixed $data): self
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
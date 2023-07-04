<?php

namespace mrmuminov\yii2playmobileuz;

use Exception;
use Throwable;

/**
 * Class ErrorResponse
 * @package mrmuminov\yii2playmobileuz
 * @author MrMuminov <
 * @since 2.0.0
 */
final class ErrorException extends Exception
{
    /**
     * Internal server error
     * Внутренняя ошибка сервера
     */
    const E_100 = 100;

    /**
     * Syntax error
     * Синтаксическая ошибка
     */
    const E_101 = 101;

    /**
     * Account lock
     * Аккаунт клиента заблокирован
     */
    const E_102 = 102;

    /**
     * Empty channel
     * Не задан канал для отправки сообщений
     */
    const E_103 = 103;

    /**
     * Invalid priority
     * Указано некорректное значение параметра priority
     */
    const E_104 = 104;

    /**
     * Too much IDs
     * Передано слишком много идентификаторов сообщений
     */
    const E_105 = 105;

    /**
     * Empty recipient
     * Адрес получателя не задан (кроме канала email)
     */
    const E_202 = 202;

    /**
     * Empty email address
     * Адрес электронной почты получателя не задан (для канала email)
     */
    const E_204 = 204;

    /**
     * Empty message-id
     * Идентификатор сообщения не задан
     */
    const E_205 = 205;

    /**
     * Invalid variables
     * Указано некорректное значение параметра variables SMS-API 5
     */
    const E_206 = 206;

    /**
     * Invalid localtime
     * Указано некорректное значение параметра localtime
     */
    const E_301 = 301;

    /**
     * Invalid start-datetime
     * Указано некорректное значение параметра start-datetime
     */
    const E_302 = 302;

    /**
     * Invalid end-datetime
     * Указано некорректное значение параметра end-datetime
     */
    const E_303 = 303;

    /**
     * Invalid allowed-starttime
     * Указано некорректное значение параметра allowed-starttime
     */
    const E_304 = 304;

    /**
     * Invalid allowed-endtime
     * Указано некорректное значение параметра allowed-endtime
     */
    const E_305 = 305;

    /**
     * Invalid send-evenly
     * Указано некорректное значение параметра send-evenly
     */
    const E_306 = 306;

    /**
     * Empty originator
     * Адрес отправителя не указан
     */
    const E_401 = 401;

    /**
     * Empty application
     * Приложение не указано
     */
    const E_402 = 402;

    /**
     * Empty ttl
     * Значение ttl не указано (если задано несколько каналов отправки)
     */
    const E_403 = 403;

    /**
     * Empty content
     * Содержимое сообщения не указано
     */
    const E_404 = 404;

    /**
     * Content error
     * Неправильный формат содержимого контента
     */
    const E_405 = 405;

    /**
     * Invalid content
     * Недопустимое значение контента для указанного канала
     */
    const E_406 = 406;

    /**
     * Invalid ttl
     * Неправильно указано значение времени ожидания доставки
     */
    const E_407 = 407;

    /**
     * Invalid attached files
     * Прикрепленные файлы имеют слишком большой объем
     */
    const E_408 = 408;

    /**
     * Invalid retry-attempts
     * Неправильно указано значение количества попыток дозвона
     */
    const E_410 = 410;

    /**
     * Invalid retry-timeout
     * Неправильно указано значение времени повторного дозвона
     */
    const E_411 = 411;

    public function __construct($code, $previous = null)
    {
        $this->setCode($code);
        $this->setMessage($this->getErrorMessage());
        parent::__construct($this->getMessage(), $this->getCode(), $previous);
    }

    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    protected function getErrorMessage(): string
    {
        $errorList = [
            self::E_100 => "#100: Internal server erro | Внутренняя ошибка сервера",
            self::E_101 => "#101: Syntax error | Синтаксическая ошибка",
            self::E_102 => "#102: Account lock | Аккаунт клиента заблокирован",
            self::E_103 => "#103: Empty channel | Не задан канал для отправки сообщений",
            self::E_104 => "#104: Invalid priority | Указано некорректное значение параметра priority",
            self::E_105 => "#105: Too much IDs | Передано слишком много идентификаторов сообщений",
            self::E_202 => "#202: Empty recipient | Адрес получателя не задан (кроме канала email)",
            self::E_204 => "#204: Empty email address | Адрес электронной почты получателя не задан (для канала email)",
            self::E_205 => "#205: Empty message-id | Идентификатор сообщения не задан",
            self::E_206 => "#206: Invalid variables | Указано некорректное значение параметра variables SMS-API 5",
            self::E_301 => "#301: Invalid localtime | Указано некорректное значение параметра localtime",
            self::E_302 => "#302: Invalid start-datetime | Указано некорректное значение параметра start-datetime",
            self::E_303 => "#303: Invalid end-datetime | Указано некорректное значение параметра end-datetime",
            self::E_304 => "#304: Invalid allowed-starttime | Указано некорректное значение параметра allowed-starttime",
            self::E_305 => "#305: Invalid allowed-endtime | Указано некорректное значение параметра allowed-endtime",
            self::E_306 => "#306: Invalid send-evenly | Указано некорректное значение параметра send-evenly",
            self::E_401 => "#401: Empty originator | Адрес отправителя не указан",
            self::E_402 => "#402: Empty application | Приложение не указано",
            self::E_403 => "#403: Empty ttl | Значение ttl не указано (если задано несколько каналов отправки)",
            self::E_404 => "#404: Empty content | Содержимое сообщения не указано",
            self::E_405 => "#405: Content error | Неправильный формат содержимого контента",
            self::E_406 => "#406: Invalid content | Недопустимое значение контента для указанного канала",
            self::E_407 => "#407: Invalid ttl | Неправильно указано значение времени ожидания доставки",
            self::E_408 => "#408: Invalid attached files | Прикрепленные файлы имеют слишком большой объем",
            self::E_410 => "#410: Invalid retry-attempts | Неправильно указано значение количества попыток дозвона",
            self::E_411 => "#411: Invalid retry-timeout | Неправильно указано значение времени повторного дозвона",
        ];
        if (isset($errorList[$this->getCode()])) {
            return $errorList[$this->getCode()];
        }
        return $this->getCode();
    }

}
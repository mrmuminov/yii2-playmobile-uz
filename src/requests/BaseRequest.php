<?php

namespace mrmuminov\yii2playmobileuz\requests;

use yii\base\Component;
use yii\httpclient\Client;
use yii\httpclient\Request;
use yii\httpclient\Exception;
use yii\httpclient\CurlTransport;
use mrmuminov\yii2playmobileuz\ErrorResponse;
use mrmuminov\yii2playmobileuz\ErrorException;

/**
 * Class BaseRequest
 *
 * @package mrmuminov\yii2playmobileuz
 * @author MrMuminov <
 * @since 2.0.0
 */
class BaseRequest extends Component
{
    /**
     * @var Client
     */
    protected Client $client;

    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var string
     */
    protected string $baseUrl = 'http://91.204.239.44/broker-api';

    /**
     * @var string
     */
    protected string $payload = '/';

    /**
     * @var string
     */
    protected string $username = '';

    /**
     * @var string
     */
    protected string $password = '';

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getRequest (): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest (Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    public function getPayload(): string
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     */
    public function setPayload(string $payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     */
    public function setContentType(string $contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @var string
     */
    protected string $contentType = 'application/json';

    public function init()
    {
        $this->setClient(new Client());
        $this->client->setTransport(new CurlTransport());
        $this->client->setTransportOptions([
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        ]);
        $this->request = $this->client->createRequest();
        $this->request->setMethod('POST');
        $this->request->setUrl($this->getBaseUrl() . $this->getPayload());
    }

    /**
     * @param mixed $content
     * @return BaseRequest
     */
    public function setContent($content): BaseRequest
    {
        $this->request->setData($content);
        return $this;
    }

    /**
     * @throws Exception
     * @throws ErrorException
     */
    public function send()
    {
        $response = $this->client->send($this->request);
        if ($response->isOk) {
            return $response->data;
        }
        if ($response->statusCode == 400) {
            $error = new ErrorResponse($this->request->getData());
            throw new ErrorException($error->getErrorCode());
        }
        throw new Exception('Ошибка при отправке запроса');
    }

}
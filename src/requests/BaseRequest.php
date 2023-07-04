<?php

namespace mrmuminov\yii2playmobileuz\requests;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\StreamInterface;
use yii\base\Component;
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
    protected Client $client;
    protected Request $request;
    protected string $baseUrl = 'http://91.204.239.44/broker-api';
    protected string $payload = '/';
    protected string $username = '';
    protected string $password = '';
    protected string $content = '';
    protected string $contentType = 'application/json';

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
    }

    public function init(): void
    {
        $this->setClient(new Client([
            'base_uri' => $this->baseUrl
        ]));
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    public function setContent(array $content): static
    {
        $this->content = json_encode($content);
        return $this;
    }

    public function send(): string
    {
        try {
            $response = $this->getClient()->post(
                uri: $this->getPayload(),
                options: [
                    RequestOptions::AUTH => [
                        $this->getUsername(),
                        $this->getPassword(),
                    ],
                    RequestOptions::HEADERS => [
                        "Content-Type" => "application/json",
                    ],
                    RequestOptions::BODY => $this->content,
                ]

            );
            return $response->getBody()->getContents();
        } catch (GuzzleException $e) {
            $exception = new ErrorException($e->getCode());
            if (!$exception->getMessage()) {
                $exception->setMessage($e->getMessage());
            }
            throw $exception;
        }
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): void
    {
        $this->payload = $payload;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

}
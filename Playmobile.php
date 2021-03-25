<?php

namespace mrmuminov\yii2playmobileuz;

use yii\base\Component;
use yii\httpclient\Client;

/**
 * This is just an example.
 */
class Playmobile extends Component
{
    public $baseUrl = "http://91.204.239.44/broker-api/";

    private $username;

    private $password;

    private $client;
    private $request;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        parent::__construct();
    }

    public function create($options){
        if (isset($options['baseUrl'])) {
            $this->baseUrl = $options['baseUrl'];
        }
        $this->client = new Client(['baseUrl' => $this->baseUrl]);
        $this->request = $this->client->createRequest();
    }

    public function send($messages = [])
    {
        $data = [];
        foreach ($messages as $message) {
            if (isset($message["recipient"]) && isset($message["message-id"]) && isset($message["originator"]) && isset($message["text"])) {
                $data[] = [
                    "recipient" => $message["recipient"],
                    "message-id" => $message["message-id"],
                    "sms" => [
                        "originator" => $message["originator"],
                        "content" => [
                            "text" => $message['text']
                        ]
                    ]
                ];
            }
        }


        $response = $this->request
            ->setUrl("send")
            ->setMethod("POST")
            ->addHeaders(['Authorization' => "Basic " . base64_encode($this->username . ":" . $this->password)])
            ->setFormat(Client::FORMAT_JSON)
            ->addData([
                "messages" => $data
            ])
            ->send();
        if ($response->isOk) {
            return $response->data;
        }
        return false;
    }
}

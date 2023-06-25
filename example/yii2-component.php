<?php

declare(strict_types=1);

/** import classes */

use mrmuminov\yii2playmobileuz\Playmobile;
use mrmuminov\yii2playmobileuz\types\Messages;
use mrmuminov\yii2playmobileuz\types\Send;
use mrmuminov\yii2playmobileuz\types\Sms;
use mrmuminov\yii2playmobileuz\types\SmsContent;

/** include autoload files */
require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

/** define constant */
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

/** init Yii2 Framework application */
(new yii\web\Application([
    'id' => 'app-playmobile',
    'basePath' => dirname(__DIR__),
    'components' => [
        'playmobile' => [
            'class' => Playmobile::class,
            'username' => "",
            'password' => "",

        ]
    ],
]));


try {

    /** Create Send class and set attributes */
    $data = new Send();
    $data->sms = new Sms();
    $data->sms->originator = "3700"; // change, if you need
    $data->sms->content = new SmsContent();
    $data->sms->content->text = "Test Message";
    $message = new Messages();
    $message->recipient = '998XXAAABBCC'; // Phone number
    $message->messageId = 'unique-id';    // Your application Unique ID
    $data->messages = [
        $message
    ];

    /** Set attributes with another way */
    //    $data = new Send([
    //        "sms" => new Sms([
    //            "originator" => "3700",
    //            "content" => new SmsContent([
    //                "text" => "Test Message",
    //            ]),
    //        ]),
    //        "messages" => [
    //            new Messages([
    //                "messageId" => 'unique-id',
    //                "recipient" => '998XXAAABBCC',
    //            ]),
    //        ]
    //    ]);

    $responseContent = Yii::$app->playmobile->send($data);
    // Success

} catch (Exception $e) {
    var_dump($e->getCode());
    var_dump($e->getMessage());
}
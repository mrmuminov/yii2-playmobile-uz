Yii2 PlaymobileUz SMS-shlyuz 
=============================
Yii2 PlaymobileUz SMS-shlyuz 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require mrmuminov/yii2-playmobile-uz "*"
```
or
```
composer require mrmuminov/yii2-playmobile-uz
```

or add

```
"mrmuminov/yii2-playmobile-uz": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php

use mrmuminov\yii2playmobileuz\Playmobile;

$playmobile = new Playmobile('username', 'password');

$playmobile->create([
    'baseUrl' => "http://91.204.239.44/broker-api/"
]);

$response = $playmobile->send([
        [
            'recipient' => "998936913932",
            'message-id' => "1",
            'originator' => "3700",
            'text' => "test",
        ],
]);
echo $response == false ? "Not sent" : "Send successfully";
```
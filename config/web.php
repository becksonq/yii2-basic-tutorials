<?php

$params = require( __DIR__ . '/params.php' );
$db = require( __DIR__ . '/db.php' );

$config = [
    'id'         => 'basic',
    'basePath'   => dirname( __DIR__ ),
    'bootstrap'  => [ 'log' ],
    'components' => [
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'gYARy9RzEb66G9F-TGSrf0H1B3S95mfl',
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'         => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => [ 'error', 'warning' ],
                ],
            ],
        ],
        'formatter'    => [
            'timeZone'       => 'Europe/Moscow',
            'dateFormat'     => 'd.MM.Y',
            'timeFormat'     => 'H:mm:ss',
            //'datetimeFormat' => 'd.MM.Y HH:mm',
            'datetimeFormat' => 'php:Y-m-d H:i:s',
        ],
        'db'           => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [

            ],
        ],

    ],
    'params'     => $params,
    'aliases'    =>
        [
            '@uploadedfilesdir' => '@app/upload'
        ],
];

if ( YII_ENV_DEV ) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

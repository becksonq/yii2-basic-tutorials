<?php

return [
    'class'        => 'yii\db\Connection',
    'dsn'          => 'mysql:host=localhost;dbname=yii2-starter-basic',
    'username'     => 'root',
    'password'     => '',
    'charset'      => 'utf8',
    'on afterOpen' => function ( $event ){
        $event->sender->createCommand( "SET time_zone = '+00:00'" )->execute();
    }
];

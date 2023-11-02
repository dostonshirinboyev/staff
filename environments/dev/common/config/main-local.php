<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=psql;port=5432;dbname=staff',
            'username' => 'postgres',
            'password' => '123456',
            'charset' => 'utf8',
            'schemaMap' => [
                'pgsql' => [
                    'class' => 'yii\db\pgsql\Schema',
                    'defaultSchema' => 'public'
                ]
            ],
        ],
        'redis' => [
            'class' => '\yii\redis\Connection',
            'port' => 6379,
            'database' => 10,
            'hostname' => 'redis',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];

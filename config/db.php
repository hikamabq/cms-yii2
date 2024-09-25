<?php

return [
    // dev -local
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=127.0.0.1;dbname=cms_database',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // dev - online
    // 'class' => 'yii\db\Connection',
    // 'dsn' => 'mysql:host=153.92.15.11;dbname=u925007001_kopral',
    // 'username' => 'u925007001_kopral',
    // 'password' => 'KopralAl!23',
    // 'charset' => 'utf8',

    // prod - online
    // 'class' => 'yii\db\Connection',
    // 'dsn' => 'mysql:host=127.0.0.1;dbname=map42691_mapadi',
    // 'username' => 'map42691_mapadi',
    // 'password' => 'MapadiJateng!23',
    // 'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=database;dbname=jsonrpc2',
    'username' => 'jsonrpc2',
    'password' => 'jsonrpc2',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

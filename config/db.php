<?php

return [
    'class' => 'yii\db\Connection',
    //'dsn' => 'mssql:host=127.0.0.1;dbname=Contable10', // MS SQL Server, mssql driver
    'dsn' => 'sqlsrv:Server=127.0.0.1;Database=Contable10',
    'username' => 'anton',
    'password' => '123',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

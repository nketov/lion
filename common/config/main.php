<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
  		'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=lion',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
    ],

];

/*  SERVER
'db' => [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=sccc.mysql.tools;dbname=sccc_lion',
    'username' => 'sccc_lion',
    'password' => 's9qjgff2',
    'charset' => 'utf8',
],
*/

/* LOCAL
'db' => [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=lion',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
],
*/
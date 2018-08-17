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
			'dsn' => 'mysql:host=lionau00.mysql.tools;dbname=lionau00_lion',
			'username' => 'lionau00_lion',
			'password' => 'fqsbp2m3',
			'charset' => 'utf8',
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',			
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'mail.adm.tools',
				'username' => 'mail@lion-auto.com.ua',
				'password' => 'lion2018',
				'port' => '25',
				'encryption' => 'ssl',
			],
		],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
    ],

];

/*  SERVER
    'components' => [
  		'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=lionau00.mysql.tools;dbname=lionau00_lion',
            'username' => 'lionau00_lion',
            'password' => 'fqsbp2m3',
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
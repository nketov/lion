<?php
$config=[
    'components' => [
    
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
$config['bootstrap'][] = 'kint';
$config['modules']['kint'] = [
    'class' => 'digitv\kint\Module',
];

return $config;
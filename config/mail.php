<?php  

return [  
    'default' => env('MAIL_MAILER', 'smtp'),  

    'mailers' => [  
        'smtp' => [  
            'transport' => 'smtp',  
            'host' => env('MAIL_HOST', 'smtp.hostinger.com'),  
            'port' => env('MAIL_PORT', 465),  
            'encryption' => env('MAIL_ENCRYPTION', 'ssl'),  
            'username' => env('MAIL_USERNAME'),  
            'password' => env('MAIL_PASSWORD'),  
            'timeout' => null,  
            'auth_mode' => null,  
            'verify_peer' => false,  
            'stream_options' => [  
                'ssl' => [  
                    'allow_self_signed' => true,  
                    'verify_peer' => false,  
                    'verify_peer_name' => false,  
                    'verify_depth' => 0,  
                    'security_level' => 0,  
                    'peer_name' => 'smtp.hostinger.com',  
                    'cafile' => null,  
                ],  
            ],  
        ],  

        'ses' => [  
            'transport' => 'ses',  
        ],  

        'mailgun' => [  
            'transport' => 'mailgun',  
        ],  

        'postmark' => [  
            'transport' => 'postmark',  
        ],  

        'sendmail' => [  
            'transport' => 'sendmail',  
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),  
        ],  

        'log' => [  
            'transport' => 'log',  
            'channel' => env('MAIL_LOG_CHANNEL'),  
        ],  

        'array' => [  
            'transport' => 'array',  
        ],  
    ],  

    'from' => [  
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),  
        'name' => env('MAIL_FROM_NAME', 'Example'),  
    ],  

    'markdown' => [  
        'theme' => 'default',  
        'paths' => [  
            resource_path('views/vendor/mail'),  
        ],  
    ],  
];
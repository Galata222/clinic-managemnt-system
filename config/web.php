<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'clinic-management-system',
    'name' => 'Clinic Management System',
    'language' => 'en',  // Set the default language
    'timeZone' => 'UTC',  // Set the default time zone

    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [

        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
            // 'user' => [
            //     'identityClass' => 'app\models\User', // Specify the User model class
            //     'enableAutoLogin' => true, // Enable automatic login
            //     'loginUrl' => ['site/login'], // Specify the login page URL
            // ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'j8msqfipD-nP2XRiLD3VN37fBhFEXUaW',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager' => [ //SETTING FOR MATERIAL DASHBOARD THEME
            'bundles' => [
                'deyraka\materialdashboard\web\MaterialDashboardAsset',
            ],
        ],
        // 'mailer' => [
        //     'class' => 'yii\symfonymailer\Mailer',
        //     'transport' =>
        //     [
        //         'dsn' => 'ses+smtp://USERNAME:PASSWORD@wakwaya.info20@gmail.com',
        //     ]
        // ],
        'mailer' => [
            'viewPath' => '@app/mail',
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false, // Set this to false to send real emails
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'galatawako222@gmail.com',
                'password' => 'Gwaqwaya@2030',
                'port' => '587', // Port for secure SMTP
                'encryption' => 'tls', // Encryption method (tls or ssl)
            ],
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            //'showScriptName' => false,
            'rules' => array(
                'lab-request/get-checkbox-options' => 'lab-request/get-checkbox-options',
            ),
        ],

    ],

    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ],
    ],
    'params' => [
        //'icon-framework' => \kartik\icons\Icon::FAS,  // Font Awesome Icon framework
        'icon-framework' => 'fa',
    ],

];
if (YII_ENV_DEV) {
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

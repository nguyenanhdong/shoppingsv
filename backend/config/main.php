<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    // require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require(__DIR__ . '/menu.php')
    // require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name'=>'Votsale',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module'
        ],
        'gridview' => ['class' => 'kartik\grid\Module'],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => 'MYM9TgEfRU18c67cKk3kVWhmr0DKZG_7',
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'mdm\admin\models\User',
            'loginUrl'  => ['site/login'],
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            'class' => 'yii\web\Session',
            'cookieParams' => ['httponly' => true, 'lifetime' => 3600*24*30],
            'useCookies' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'formatter' => [
            'dateFormat' => 'YYYY-MM-DD HH:mm:ss',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
       ],
       'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=shopping',
            'username' => 'helio',//helio
            'password' => '123456',//123456
            'charset' => 'utf8',
            'emulatePrepare' => true
        ],
        'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
                // 'employee/*'
                // The actions listed here will be allowed to everyone including guests.
                // So, 'admin/*' should not appear here in the production, of course.
                // But in the earlier stages of your development, you may probably want to
                // add a lot of actions here until you finally completed setting up rbac,
                // otherwise you may not even take a first step.
            ]
        ],
    ],
    'params' => $params,
    'as beforeAction' => [
        'class' => 'backend\components\UAccess'
    ],
];

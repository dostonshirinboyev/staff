<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'name' => Yii::t('app', 'ARM'),
    'id' => 'app-arm',
    'language' => 'uz',
    'timeZone' => 'Asia/Tashkent',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'common\bootstrap\SetUp',
        'arm\bootstrap\SetUp',
    ],
    'controllerNamespace' => 'arm\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-ssuv',
            'cookieValidationKey' => $params['cookieValidationKey'],
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\auth\Identity',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity', 'httpOnly' => true, 'domain' => $params['cookieDomain']],
            'loginUrl' => ['auth/auth/login'],
        ],
        'session' => [
            'name' => '_session',
            'cookieParams' => [
                'domain' => $params['cookieDomain'],
                'httpOnly' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'backendUrlManager' => require __DIR__ . '/../../backend/config/urlManager.php',
        'armUrlManager' => require __DIR__ . '/urlManager.php',
        'urlManager' => function () {
            return Yii::$app->get('armUrlManager');
        },

    ],
//    'as access' => [
//        'class' => 'yii\filters\AccessControl',
//        'except' => [
//            'auth/auth/login',
//            'auth/auth/hemis-student-login',
//            'auth/auth/hemis-employee-login',
//            'site/index',
//        ],
//        'rules' => [
//            [
//                'allow' => true,
//                'roles' => ['@'],
//            ],
//        ],
//    ],
    'params' => $params,
];

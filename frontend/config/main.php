<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'Quiniela World Cup',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'es-MX',
    'sourceLanguage' => 'es-MX',
    'bootstrap' => [
        'log'],
         'aliases' => [
        '@logo' =>'/frontend/assets/',
    ],
    'components' => [
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d/m/Y',
            'datetimeFormat' => 'php:d/m/Y H:i',
            'timeFormat' => 'php:H:i:s',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'defaultTimeZone' => 'America/La_Paz',
            'numberFormatterOptions' => [
                NumberFormatter::MIN_FRACTION_DIGITS => 2,
                NumberFormatter::MAX_FRACTION_DIGITS => 2,
            ]
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'practical-a-frontend',
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
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ]
    ],
    'params' => $params,
];

<?php
use kartik\mpdf\Pdf;
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_LETTER,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            //'cssInline' => 'p { color: blue; }',
            'options' => ['title' => 'Reporte'],
            // refer settings section for all configuration options
            'methods' => [
                'setHeader' => ['<h4>Reporte</h4>||<small>FECHA: {DATE d/m/y}</small>'],
                'setFooter' => ['&copy; avanto.mx || {PAGENO}']
            ]
        ],
    ],
];

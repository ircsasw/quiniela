<?php

namespace backend\assets_b;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets_b';
    public $css = [
        'css/site.css',
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/simple-line-icons.min.css',
        'css/_all-skins.min.css',
        'css/AdminLTE.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

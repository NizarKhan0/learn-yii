<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    // for register assest the base url is in folder web like laravel in folder public
    public $css = [
        'css/site.css',
        'custom/vendors/switchery/dist/switchery.min.css',
        'custom/build/css/custom.min.css',
        'custom/vendors/iCheck/skins/flat/green.css',
    ];
    public $js = [
        'custom/vendors/switchery/dist/switchery.min.js',
        'custom/vendors/iCheck/icheck.min.js',
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
        'yiister\gentelella\assets\ThemeAsset',
        'yiister\gentelella\assets\ExtensionAsset',
    ];
}

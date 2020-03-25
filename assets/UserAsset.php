<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class UserAsset extends AssetBundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $css = [
  ];
  public $js = [
    'js/statusButton.js',
    'js/doPay.js',
  ];
  public $depends = [
    'app\assets\AppAsset',
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
  ];
}

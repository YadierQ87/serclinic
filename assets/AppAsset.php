<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/ace-rtl.css',
        'css/ace.css',
        'font-awesome/css/font-awesome.min.css',
        'js/datetimepicker/bootstrap-datetimepicker.min.css',
        'js/xcharts/xcharts.min.css',
        'js/select2-4.0.3/dist/css/select2.min.css',
        'js/typeahead/typeahead-styles.css',
        'js/multiple/multiple-select.css',
        'js/datatable/media/css/dataTables.bootstrap.min.css',
        'js/datatable/media/css/jquery.dataTables.min.css',
		'js/bootstrap-daterangepicker-master/daterangepicker.css',

    ];
    public $js = [
        'js/ace.js',
        'js/ace-extra.js',
        'js/typeahead/typeahead.js',
        'js/tooltip.js',
        'js/datetimepicker/bootstrap-datetimepicker.js',		
        'js/multiple/jquery.multiple.select.js',
        'js/datatable/media/js/jquery.dataTables.min.js',
        'js/datatable/media/js/dataTables.bootstrap.min.js',
		'js/bootstrap-daterangepicker-master/moment.min.js',
        'js/bootstrap-daterangepicker-master/daterangepicker.js',
        'js/select2-4.0.3/dist/js/select2.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

<?php
require  'a.php';
exit;
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/1/11
 * Time: 15:53
 */
if (version_compare(PHP_VERSION, '5.3', '<'))
{
    die("phpversion require '5.3+''");
}
//定义debug
define('APP_DEBUG',TRUE);
if(APP_DEBUG){
    ini_set('diaplay_errors',0);
    if (version_compare(PHP_VERSION, '5.3', '>='))
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
    }
    else
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
    }
}else{
    ini_set('diaplay_errors',false);
}

define('DS', DIRECTORY_SEPARATOR);
//定义根目录
define('WEB_PATH',__DIR__);
//系统类库路径
define('SYS_PATH',WEB_PATH.DS.'System');
//业务逻辑方法库
define('APP_PATH',WEB_PATH.DS.'App');

require_once SYS_PATH.DS.'Load.php';





<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/1/11
 * Time: 16:59
 */
//引入自动加载类
require_once 'System\Cmautoload.php';
spl_autoload_register('Cmautoload::autoload' );

//1配置
//2路由

//3控制器
$uri =  strtolower($_SERVER['REQUEST_URI']);
if( strpos($uri,'.php') !== false )
{
    $uri_arrs = explode('.php',$uri);
    $uri = $uri_arrs[1];
}
if( $uri )
{
    $uri_arr = explode('/',$uri);
    $param_arr = array();
    foreach ($uri_arr as $key => $item_uri)
    {
        if( $uri_arr[$key+1] )
        {
            $param_arr[$item_uri] = $uri_arr[$key+1];
        }
    }
}
var_dump($param_arr);

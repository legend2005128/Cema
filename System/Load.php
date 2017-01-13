<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/1/11
 * Time: 16:59
 */
//引入自动加载类
require_once SYS_PATH.'/Cmautoload.php';
spl_autoload_register('Cmautoload::autoload' );
//加载公共函数
require_once SYS_PATH.'/Common/functions.php';
//1.配置
//2.路由
//3.URL defined
$uri_type = '';
if( is_cli() )
{
    $args = array_slice($_SERVER['argv'], 1);
    $uri = $args ? implode('/',$args):'';
}
else
{
    $uri =  trim(strtolower($_SERVER['REQUEST_URI']),'/');
}
$uri_seg_arr = array();
uri_params($uri,$uri_seg_arr);
//5加载控制器
if($uri_seg_arr)
{
    $i = 0;
    $params= '';
    foreach ($uri_seg_arr as $con =>$func_v)
    {
        if($i == 0)
        {
            require_once str_replace('\\','/',APP_PATH.'/Controller/'.ucfirst($con)."Controller.php");
            $instance =  'App\\Controller\\'.ucfirst($con)."Controller";
            $function = $func_v;
        }
        else
        {
            $params = $func_v.',';
        }
        $i++;
    }
    $params = trim( $params , ',' );
    try{
        $instance::$function();
    }catch( Exception $e){
        throw new $e;
    }
}
else{
    App\Controller\IndexController::Index();
}







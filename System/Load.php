<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/1/11
 * Time: 16:59
 */
//引入自动加载类
<<<<<<< HEAD
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
=======
require_once SYS_PATH.'/Cmautoload.php';
spl_autoload_register('\System\Cmautoload::autoload' );
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
    $param_arr=[];
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
            $param_arr[$con]=$func_v;
        }
        $i++;
    }
    try{
        $reflection = new ReflectionClass( $instance );
        if( ! $reflection->hasMethod( $function ) )
        {
            echo 'Method not found!';
            EXIT(403);
        }
       $actionReflection = $reflection->getMethod( $function );
       if( !($actionReflection->isPublic()) ){
           echo 'Method not allowed!';
           EXIT(401);
       }
       $paramters = $actionReflection->getParameters();

        $param_arr = array_values($param_arr);

        foreach($paramters as $key=>$v)
        {
            if( isset($param_arr[$key]))
            {
                $uri_arr[] = $param_arr[$key];
            }
        }
        $actionReflection->invokeArgs( $reflection->newInstance(),$uri_arr );
    }catch( Exception $e){
        throw new $e;
    }
}
else{
    App\Controller\Index::Index();
}



>>>>>>> b44f731c4faefc3484e08caa2024ec67b8ae6214

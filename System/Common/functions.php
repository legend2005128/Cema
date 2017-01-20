<?php
function is_cli()
{
    return (PHP_SAPI === 'cli' OR defined('STDIN'));
}
/**
 * URI helper
 * 格式化 url 地址函数
 *
 *
 */
function uri_params(   $uri,  &$param_arr  )
{
    $param_arr = array();
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
            if( isset($uri_arr[$key+1]) && !($key%2) )
            {
                $param_arr[$item_uri] = $uri_arr[$key+1];
                unset($uri_arr[$key+1]);
            }
        }
    }
}

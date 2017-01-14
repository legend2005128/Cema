<?php

/**
 * Config Class
 * Created by PhpStorm.
 * User: li
 * Date: 2017/1/14
 * Time: 9:14
 */

namespace System;
use System;
class Config extends Facodes
{
    protected static $directory ;
    protected static $class;
    protected static $instance;

    public static function load( $class = ''){

        self::$instance = false;
        self::$class = $class?$class:'config';
        self::$directory = APP_PATH.DS.'Config'.DS;
        $config_file = self::$directory.self::$class.'.php' ;
        if(file_exists(  $config_file ))
        {
            self::$instance = true;
            return include $config_file;
        }else{
            exit('Your config file does not appear to be formatted correctly.');
        }
    }
    public static function item( $file ='config',$key = false )
    {
         $config = array();
         $config= self::load( $file);
         if( self::$instance )
         {
            if($key === false)
            {
                return $config;
            }
            return isset($config[$key])?$config[$key]:'undefined';
         }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/1/11
 * Time: 16:04
 */

/***
 * Class Cmautoload
 * 自动加载类
 */
namespace  System;
class Cmautoload
{
    public static  function autoload( $classname ){
            if( $classname ){
                self::loadClass($classname);
            }
    }
    public static function loadClass($class)
    {
        if ($file = self::findFile($class)) {
            self::includeFile($file);
            return true;
        }
    }
    public static function findFile($classname)
    {
        $class_path = str_replace('\\','/',WEB_PATH.'/'.ucfirst($classname).'.php');
        $class_real_path = WEB_PATH.DS.ucfirst($classname).'.php';
        if( is_file($class_real_path)) {
            return $class_path;
        }
        return FALSE;
    }
    public static function includeFile($file){
         require_once $file;
    }
}


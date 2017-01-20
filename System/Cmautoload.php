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
<<<<<<< HEAD
=======
namespace  System;
>>>>>>> b44f731c4faefc3484e08caa2024ec67b8ae6214
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
<<<<<<< HEAD
        $class_path = str_replace('/','\\',SYS_PATH.'\Libs\\'.ucfirst($classname).'.php');
        if( is_file($class_path)) {
=======
        $class_path = str_replace('\\','/',WEB_PATH.'/'.ucfirst($classname).'.php');
        $class_real_path = WEB_PATH.DS.ucfirst($classname).'.php';
        if( is_file($class_real_path)) {
>>>>>>> b44f731c4faefc3484e08caa2024ec67b8ae6214
            return $class_path;
        }
        return FALSE;
    }
    public static function includeFile($file){
<<<<<<< HEAD
        require_once $file;
=======
         require_once $file;
>>>>>>> b44f731c4faefc3484e08caa2024ec67b8ae6214
    }
}


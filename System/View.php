<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/1/13
 * Time: 15:04
 */

namespace System;

class View
{
     protected static $view_file = APP_PATH.'\View';
     protected static $view_data = array();
    /***
     * 显示
     * $view
     */
     public static  function display( $view = '', array $data )
     {
            self::$view_file .= DS.$view.'.html';
            $output = file_get_contents( self::$view_file );
             foreach ($data as $key=>$v){
                 $output = str_replace('{$'.$key.'}',$v,$output);
             }
            ob_start();
            echo $output;
     }

}
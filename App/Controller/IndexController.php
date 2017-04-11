<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/1/13
 * Time: 10:25
 */

namespace App\Controller;

use System\View;

class IndexController
{
      public  function show($id,$cname){

           var_dump($id,$cname);

           $seo = array('title'=>'000000000000000');
           View::display('Index/show',$seo);
        }
    function index(){

        $hello = array('word'=>'欢迎进入框架');
        View::display('Index/index',$hello);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: freedom
 * Date: 2018/10/6
 * Time: 17:36
 */
//自定义函数
function p($arr){
    $style = "style = 'position:relative;z-index:100;padding:10px;border-radius:10rpx;background:#F5F5F5;border:1px solid #aaa;font-size:16px;line-height:20px;opacity:0.9;'";
    if(is_null($arr) || is_bool($arr)){
        var_dump($arr);
    } else {
        echo '<pre '.$style.'>';
        print_r($arr);
        echo '</pre>';
    }
}
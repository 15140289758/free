<?php
/**
 * Created by PhpStorm.
 * User: freedom
 * Date: 2018/10/8
 * Time: 10:19
 */
namespace core\lib;

class log{
    //创建一个属性存放类
    static $class;
    /**
     * 1、确定日志的存储方式
     * 2、写日志
     */
    static public function init(){
        $drive = conf::get('DRIVE', 'log');
        //加载类
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class();
    }

    static public function log($name, $file = 'log'){
        self::$class->log($name, $file);
    }
}
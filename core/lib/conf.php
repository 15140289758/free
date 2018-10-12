<?php
/**
 * Created by PhpStorm.
 * User: freedom
 * Date: 2018/10/7
 * Time: 20:40
 */
namespace core\lib;

class conf{
    //静态的属性，存放数组
    static public $conf = [];
    static public function get($name, $file){
        /**
         * 1 判断配置文件是否存在
         * 2 判断配置文件是否已加载
         * 3 缓存配置--一定要限制重复加载配置文件
         */
        if(isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }
        $path = FREEDOM . '\core\conf\\'. $file .'.php';
        if(is_file($path)){
            //加载文件
            $conf = include $path;
            if(isset($conf[$name])){
                self::$conf[$file] = $conf;
                return $conf[$name];
            } else {
                throw new \Exception('没有配置项');
            }
        } else {
            throw new \Exception('找不到配置文件'.$file);
        }
    }

    static public function all($file){
        if(isset(self::$conf[$file])){
            return self::$conf[$file];
        } else {
            $path = FREEDOM . '\core\conf\\'. $file .'.php';
            if(is_file($path)){
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            } else {
                throw new \Exception('没有找到配置文件'.$file);
            }
        }
    }
}
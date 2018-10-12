<?php
/**
 * Created by PhpStorm.
 * User: freedom
 * Date: 2018/10/6
 * Time: 20:12
 * 路由
 */
namespace core\lib;

class Route{
    //默认的控制器和方法
    public $controller;
    public $action;
    //路由类的构造函数
    public function __construct(){
        //目的：实现访问xxx.com/index/index
        /**
         * 1、隐藏掉index.php--需要在根目录下创建.htaccess文件
         * 2、获取到url的参数部分
         * 3、返回对应的控制器和方法
         */

        //获取到url中的变量
        //如果网址是xxx.com，后面没有带任何其他的，$_SERVER['REQUEST_URI']的结果是个/
        $path = $_SERVER['REQUEST_URI'];
        if(isset($path) && '/' != $path){
            //$path的格式是 /index/index，先将第一个/去掉，然后解析成数组
            $pathArr = explode('/', trim($path, '/'));
            //判断数组的第一个元素是否存在，如果存在，这个就是控制器
            if(isset($pathArr['0'])){
                $this->controller = $pathArr['0'];
                unset($pathArr['0']);
            }
            //数组的第二个元素是方法，如果不存在，默认是index
            if(isset($pathArr['1'])){
                $this->action = $pathArr['1'];
                unset($pathArr['1']);
            } else {
                $this->action = conf::get('ACTION', 'route');
            }
            //将url的多余部分转换成GET参数
            //1、先将转换的数组第一位和第二位去掉，去掉之后的结果是id/1/name/2
            //2、设置变量，循环拆分数据
            $count = count($pathArr) + 2;//因为变量$i是从2开始的
            $i = 2;//第一位和第二位是控制器和方法
            while($i < $count){
                //有可能url地址的参数不是成对出现的，所以要判断$i + 1是否存在
                if(isset($pathArr[$i + 1])){
                    $_GET[$pathArr[$i]] = $pathArr[$i + 1];
                }
                $i += 2;
            }
        } else {
            //默认的控制器和方法
            $this->controller = conf::get('CONTROLLER', 'route');
            $this->action = conf::get('ACTION', 'route');
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: freedom
 * Date: 2018/10/6
 * Time: 17:30
 *
 * 入口文件
 * 1、定义常量
 * 2、加载函数库
 * 3、启动框架
 */

//定义常量
define('FREEDOM', realpath('.'));//当前框架所在的目录
define('CORE', FREEDOM.'/core');//框架的核心文件
define('APP', FREEDOM.'/application');//定义框架的项目文件，包括控制器、模型等
define('MODULE', 'application');

define('DEBUG', true);//是否开启debug模式

//利用composer下载的了一个炫酷的错误展示类，首先需要引入文件
include "vendor/autoload.php";

if(DEBUG){
    $whoops = new \Whoops\Run();
    $errorTitle = "框架出错了";
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_error', 'On');//如果开启debug，显示错误信息
} else {
    ini_set('display_error', 'Off');//如果没有开启debug，那么不显示错误信息
}

//加载函数库
include CORE.'/common/function.php';

//测试方法是否加载
//p(FREEDOM);

//加载框架的核心文件
include CORE. '/free.php';

//当new一个类的时候，如果这个类不存在，就会触发下面的方法
spl_autoload_register('\core\Free::load');

//利用命名空间调用free框架核心文件的run方法
\core\Free::run();











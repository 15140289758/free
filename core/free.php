<?php
/**
 * Created by PhpStorm.
 * User: freedom
 * Date: 2018/10/6
 * Time: 20:06
 */
//命名空间
namespace core;

class Free{
    //静态的变量，存放已经加载的文件
    public static $classMap = [];
    //存放赋值静态页面的数据
    public $assign;
    //启动框架的方法
    static public function run(){
        //启动日志
        \core\lib\log::init();
        \core\lib\log::log(1111);
        $route = new \core\lib\route();
        $controller = $route->controller;
        $action = $route->action;
        //先判断控制器文件是否存在，$controller是index
        $controllerFile = APP.'/controller/'.$controller.'Controller.php';
        $controllerClass = '\\'.MODULE.'\\controller\\'.$controller.'Controller';
        if(is_file($controllerFile)){
            include $controllerFile;
            $ctrl = new $controllerClass;//创建的是对象
            $ctrl->$action();
        } else {
            throw new \Exception("找不到控制器".$controller);
        }
    }

    //自动加载类库
    static public function load($class){
        //加载类库的形式是 new \core\route();
        //$class = new \core\route();
        //最终需要加载的文件是 FREEDOM.'/core/route.php'
        //使用静态变量$classMap是为了防止重复加载文件的情况
        if(isset(self::$classMap[$class])){
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = FREEDOM. '/'. $class. '.php';
            if(is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $val){
        $this->assign[$name] = $val;
    }

    public function display($file){
        $file = APP.'/views/'.$file;
        if(is_file($file)){
//            extract($this->assign);

            $loader = new \Twig_Loader_Filesystem(APP.'/views');
            $twig = new \Twig_Environment($loader, [
                'cache' => FREEDOM. '/runtime/'. date('Ymd'),
                'debug' => DEBUG,
            ]);
            $template = $twig->loadTemplate('index.html');
            $template->display($this->assign?$this->assign:'');
        }
    }
}






















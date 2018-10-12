<?php
/**
 * Created by PhpStorm.
 * User: freedom
 * Date: 2018/10/7
 * Time: 8:17
 * 如果类名和方法名同名，那么方法就变成了初始化的方法,所以将类名添加controller后缀，保证与方法名不同
 */
namespace application\controller;

use \core\free;
use core\lib\model;

class indexController extends free{
    public function index(){
//        $data = "hello world";
//        $this->assign('data', $data);
//        $this->display('index.html');


//        $model = new \application\model\userModel();
//        $data['name'] = '222111';
//        $res = $model->setOne(1, $data);
//        dump($res->rowCount());

//        $model = new model();
//        $data = [
//            'name' => 'free',
//            'age' => 18,
//        ];
//        $model->insert('users', $data);
//        $id = $model->id();
//        dump($id);


//        $temp = \core\lib\conf::get('CONTROLLER', 'route');
//        $temp = \core\lib\conf::get('ACTION', 'route');
//        $model = new \core\lib\model();
//        $sql = "select * from users";
//        $res = $model->query($sql);
//        $this->assign('res', $res->fetchAll());
//        $this->display('index');
    }

    public function test(){
        $data = "hello world test";
        $this->assign('data', $data);
        $this->display('test.html');
    }
}
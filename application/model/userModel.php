<?php
/**
 * Created by PhpStorm.
 * User: freedom
 * Date: 2018/10/10
 * Time: 12:35
 */
namespace application\model;

use core\lib\model;

class userModel extends model{
    public $table = 'users';
    public function lists(){
        $res = $this->select($this->table, '*');
        return $res;
    }

    public function getOne($id){
        $res = $this->get($this->table, '*', ['id' => $id]);
        return $res;
    }

    public function setOne($id, $data){
        return $this->update($this->table, $data, ['id' => $id]);
    }
}
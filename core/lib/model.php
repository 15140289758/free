<?php
/**
 * Created by PhpStorm.
 * User: freedom
 * Date: 2018/10/7
 * Time: 8:35
 */
namespace core\lib;

use core\lib\conf;
use Medoo\Medoo;
class model extends Medoo{
    public function __construct(){
//        $database = conf::all('database');
//        try{
//            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWORD']);
//        } catch(\PDOException $e){
//            p($e->getMessage());
//        }
        $option = conf::all('database');
        parent::__construct($option);
    }
}
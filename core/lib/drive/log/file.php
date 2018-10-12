<?php
/**
 * Created by PhpStorm.
 * User: freedom
 * Date: 2018/10/8
 * Time: 10:22
 */
namespace core\lib\drive\log;

use core\lib\conf;

class file{
    //日志的存储位置
    public $path;

    public function __construct(){
        $path = conf::get('OPTION', 'log');
        $this->path = $path['PATH'];
    }
    public function log($message, $file = 'log'){
        /**
         * 1、确定文件存储的位置是否存在
         * 2、不存在，创建目录
         * 3、写日志
         */
        if(!is_dir($this->path.date('YmdH'))){
            //保证文件能够正常写入
            mkdir($this->path.date('YmdH'), '0777', true);
        }
        return file_put_contents($this->path.date('YmdH').'/'.$file.'.php', date('Y-m-d H:i:s').json_encode($message).PHP_EOL, FILE_APPEND);
    }
}
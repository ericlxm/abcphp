<?php
/**
 * User: lxm
 * Date: 2018/4/22
 * Time: 下午8:53
 */
namespace  abccore\lib;

class Controller
{
    public $assign;
    public function __construct()
    {
    }

    public function assign($name,$value)
    {
        $this->assign[$name]=$value;
    }

    public function render($file)
    {
        $file=APP.'/views/'.$file;
        if(is_file($file)){
            extract($this->assign);
            include $file;
        }
    }

}
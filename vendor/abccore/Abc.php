<?php
namespace abccore;


class Abc
{

    public $classMap = array();

    public function __construct()
    {}

    // 运行程序
    public function run()
    {
        spl_autoload_register(array(
            $this,
            'load'
        ));
        $route = new lib\Route();

    }

    public function load($class)
    {
        // 自动加载类库
        if (isset($this->classMap[$class])) {
            return true;
        } 
        else {
            $class = str_replace('\\', '/', $class);
            $file = ABC .'/vendor/'. $class . '.php';
            
             if (is_file($file)) {
                 include $file;
                 $this->classMap[$class] = $class;
             } else {
                return false;
             }
        }

       
        
    }
}
<?php
namespace abccore\lib;

class Route {
    public $controllerName;
    public $actionName;
    public function __construct()
    {
        //pp($_SERVER);
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/'){
            $url = $_SERVER['REQUEST_URI'];
            $urlarr=explode('/', trim($url,'/'));
            if(isset($urlarr[0])){
                $this->controllerName=ucfirst($urlarr[0]);

            }
            unset($urlarr[0]);
            if(isset($urlarr[1])){
                $this->actionName=$urlarr[1];
                unset($urlarr[1]);

            }else{
                $this->actionName='index';
            }
            //get参数转换
            $count=count($urlarr)+2;
            $i=2;
            while($i<$count){
                if(isset($urlarr[$i+1])){
                    $_GET[$urlarr[$i]]=$urlarr[$i+1];
                }
                $i=$i+2;
            }
            //pp($_GET);
        }else{
            $this->controllerName='index';
            $this->actionName='index';
        }

        // 判断控制器和操作是否存在
//        $controller = 'app\\controllers\\'. $this->controllerName . 'Controller';
//        pp($controller);
//        if (!class_exists($controller)) {
//            exit($controller . '控制器不存在');
//        }
//        if (!method_exists($controller, $actionName)) {
//            exit($actionName . '方法不存在');
//        }
//        $dispatch = new $controller($this->controllerName, $this->actionName);
//        call_user_func_array(array($dispatch, $this->actionName), $_GET);
        $controllerfile = APP.'/controllers/'.$this->controllerName . 'Controller.php';
        if(is_file($controllerfile)){
            include $controllerfile;
            $controller=new \app\controllers\IndexController();
            $controller->index();
        }
    }
    
    
}
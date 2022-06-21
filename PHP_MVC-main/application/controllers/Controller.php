<?php
namespace application\controllers;

abstract class Controller {
    public function __construct($action) {        
        $view = $this->$action();
        require_once $this->getView($view); 
    }
    
    protected function addAttribute($key, $val) {
        $this->$key = $val;
    }

    protected function getView($view) {
        if(strpos($view, "redirect:") === 0) {
            header("Location: http://" . _HOST . substr($view, 9));
        }
        return _VIEW . $view;
        //_VIEW : config.php 파일에 있음
        //php : $는 "변수", ''는 "문자열", 앞에 아무것도 없도 대문자면 "상수(변하지 않는 값)"
    }
}


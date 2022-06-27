<?php
namespace application\controllers;

class Controller {    
    protected $model;
    private static $needLoginUrlArr = [
        //로그인 상태가 아닐때 주소창에 feed 들어가면 권한이 없음으로 뜸
        "feed"
    ];

    public function __construct($action, $model) {    
        if(!isset($_SESSION)) {
            session_start();
        }    
        $urlPaths = getUrl();
        foreach(static::$needLoginUrlArr as $url) {
            if(strpos( $urlPaths, $url) === 0 && !isset($_SESSION[_LOGINUSER]) ) {
                //echo "권한이 없습니다.";
                //header("Location:/user/signin");
                $this->getView("redirect:/user/signin");
                exit();
            }
        }

        $this->model = $model;
        $view = $this->$action();
        if(empty($view)) {
            echo "Controller 에러 발생";
            exit();
        }

        if(gettype($view) === "string") {
            require_once $this->getView($view);             
        } else if(gettype($view) === "object" || gettype($view) === "array") {
            header("Content-Type:application/json");
            echo json_encode($view);
        }        
    }
    private function chkLoginUrl() {

    }
    
    protected function addAttribute($key, $val) {
        $this->$key = $val;
    }

    protected function getView($view) {
        if(strpos($view, "redirect:") === 0) {
            header("Location: " . substr($view, 9));
            exit();
        }
        return _VIEW . $view;
    }

    protected function flash($name = '', $val = '') {
        if(!empty($name)) { //공백이 아니면
            if(!empty($val)) {
                $_SESSION[$name] = $val;
            } else if(empty($val) && !empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
        }
    }
}
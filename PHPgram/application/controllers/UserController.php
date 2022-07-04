<?php
namespace application\controllers;

require_once "application/utils/UrlUtils.php";
use application\libs\Application;

class UserController extends Controller {
    public function signin() {
        
        switch(getMethod()) {
            case _GET:
                return "user/signin.php";
            case _POST:
                //아이디, 비번이 하나라도 없거나 틀리면 > redirect => signin.php
                //아이디, 비번이 맞으면 > redirect => feed/index
                
                /*
                $param = [
                    "email" => $_POST['email'],
                    "pw" => $_POST['pw']
                ];

                $dbUser = $this->model->selUser($param);
                if($dbUser === false || !password_verify($param['pw'], $dbUser->pw)) {
                    return "redirect:signin";
                } 

                $this->flash(_LOGINUSER, $dbUser);

                return "redirect:/feed/index";
                */

            //강사님 풀이
                $email = $_POST["email"];
                $pw = $_POST["pw"];
                $param = [ "email" => $email ];
                $dbUser = $this->model->selUser($param);
                if(!$dbUser || !password_verify($pw, $dbUser->pw)) {                                                        
                    return "redirect:signin?email={$email}&err";
                }
                $dbUser->pw = null;
                $dbUser->regdt = null;
                //null을 주는 이유 : memory 사용량을 줄이기 위해
                $this->flash(_LOGINUSER, $dbUser);
                return "redirect:/feed/index";
        
        }
    }

    public function signup() {
        // print getMethod();
        // if(getMethod() === _GET) {
        //     return "user/signup.php";
        // } else if(getMethod() === _POST) {
        //     return "redirect:signin";
        // }

        switch(getMethod()) {
            case _GET:
                return "user/signup.php";
            case _POST:

                $param = [
                    "email" => $_POST['email'],
                    "pw" => $_POST['pw'],
                    "nm" => $_POST['nm']
                ];

                $param["pw"] = password_hash($param["pw"], PASSWORD_BCRYPT);

                $this->model->insUser($param);

                return "redirect:signin";
        }
    }

    public function logout() {

        $this->flash(_LOGINUSER);
        
        return "redirect:/user/signin";
    }

    public function feedwin() {
        $iuser = isset($_GET["iuser"]) ? intval($_GET["iuser"]) : 0;
        $param = [ "feediuser" => $iuser, "loginiuser" => getIuser() ];
        $this->addAttribute(_DATA, $this->model->selUserProfile($param));
        $this->addAttribute(_JS, ["user/feedwin", "https://unpkg.com/swiper@8/swiper-bundle.min.js"]);        
        $this->addAttribute(_CSS, ["feed/index", "user/feedwin", "https://unpkg.com/swiper@8/swiper-bundle.min.css"]);        
        $this->addAttribute(_MAIN, $this->getView("user/feedwin.php"));
        return "template/t1.php"; 
    }

    public function feed() {
        if(getMethod() === _GET) {
            $iuser = isset($_GET["iuser"]) ? intval($_GET["iuser"]) : 0;
            $page = 1;
                if(isset($_GET["page"])) {
                    $page = intval($_GET["page"]);
                }
                $startIdx = ($page-1) * _FEED_ITEM_CNT;
                $param = [
                    "startIdx" => $startIdx,
                    "iuser" => $iuser
                ];
            $list = $this->model->selFeedList($param);
            foreach($list as $item) {
                $item->imgList = Application::getModel("feed")->selFeedImgList($item);
            }
            return $list;
        }
    }
    
    /*
    public function follow() {
        $toiuser = $_POST["toiuser"];
        $param = [
            "toiuser" => $toiuser,
            "fromiuser" => getIuser()
        ];
        
        switch(getMethod()) {
            
            case _POST:
                $this->model->insFollow($param);
                
                return [_RESULT => 1];
            case _DELETE:

                $urlPaths = getUrlPaths();
                if(!isset($urlPaths[2])) {
                    exit();
                }
                $param["toiuser"] = intval($urlPaths[2]);
                $this->model->delFollow($param);

                return [_RESULT => 1];
        }
    }
    */
    

    //강사님 풀이
    
    public function follow() {

        $param = [
            "fromiuser" => getIuser()
        ];

        switch(getMethod()) {
            case _POST:
                $json = getJson();
                $param["toiuser"] = $json["toiuser"];
                return [_RESULT => $this->model->insFollow($param)];

            case _DELETE:
                $param["toiuser"] = $_GET["toiuser"];
                return [_RESULT => $this->model->delFollow($param)];
        }
    }
    

}
<?php
namespace application\controllers;

class FeedController extends Controller {
    public function index() {
        $this->addAttribute(_JS, ["feed/index"]);
        $this->addAttribute(_MAIN, $this->getView("feed/index.php"));
        return "template/t1.php";
    }

    public function rest() {
        //print "method : " . getMethod() . "<br>";
        switch(getMethod()) {
            case _POST:
            if(!is_array($_FILES) || !isset($_FILES['imgs'])) {
                return ["result" => 0];
                //result가 0이면 실패, 1이어야 성공
            }
                
            // $location = $_POST["location"]; 
            // $ctnt = $_POST["ctnt"];
            $iuser = getIuser();
            
            $param = [
                "location" => $_POST["location"],
                "ctnt" => $_POST["ctnt"],
                "iuser" => $iuser
            ];
            $ifeed =  $this->model->insFeed($param);

            foreach($_FILES["imgs"]["name"] as $key => $value) {
                //확장자 얻어오기
                $file_name = explode(".", $value);
                
                //배열의 마지막 인덱스 값 가져 오기 
                //$file_name[count($file_name)-1];
                $ext = end($file_name);

                $saveDirectory = _IMG_PATH . "/profile/" . $iuser;
                if(!is_dir($saveDirectory)) {
                    mkdir($saveDirectory, 0777, true);
                }
                $tempName = $_FILES['imgs']['tmp_name'][$key];
                move_uploaded_file($tempName, $saveDirectory . "/test." . $ext); 
                
            }

            return "redirect:/feed/index";
               
        }
    }
}

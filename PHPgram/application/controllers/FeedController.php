<?php
namespace application\controllers;

class FeedController extends Controller {
    public function index() {
        $this->addAttribute(_JS, ["feed/index", "https://unpkg.com/swiper@8/swiper-bundle.min.js"]);
        $this->addAttribute(_CSS, ["feed/index", "https://unpkg.com/swiper@8/swiper-bundle.min.css"]);
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
                    "iuser" => $iuser,
                ];
                $ifeed =  $this->model->insFeed($param);


                foreach($_FILES["imgs"]["name"] as $key => $originFileNm) {
                //확장자 얻어오기
                    //$file_name = explode(".", $originFileNm);
                    
                //배열의 마지막 인덱스 값 가져 오기 
                    //$file_name[count($file_name)-1];
                    //$ext = end($file_name);

                    $saveDirectory = _IMG_PATH . "/feed/" . $ifeed;
                    if(!is_dir($saveDirectory)) {
                        mkdir($saveDirectory, 0777, true);
                    }
                    $tempName = $_FILES['imgs']['tmp_name'][$key];
                    $randomFileNm = getRandomFile($originFileNm);
                    move_uploaded_file($tempName, $saveDirectory . "/" . $randomFileNm);

                    $paramImg = [
                        "ifeed" => $ifeed,
                        "img" => $randomFileNm
                    ];
                    
                    $this->model->insFeedImg($paramImg);
                    
                }

                return ["result" => 1];

            case _GET:
                $page = 1;
                if(isset($_GET["page"])) {
                    $page = intval($_GET["page"]);
                }
                $startIdx = ($page-1) * _FEED_ITEM_CNT;
                $param = [
                    "startIdx" => $startIdx,
                    "iuser" => getIuser()
                ];
                $list =  $this->model->selFeedList($param);
                foreach($list as $item) {
                    $imgs = $this->model->selFeedImgList($item);
                    $item->imgList = $imgs;
                }
                return $list;
                               
        }
    }
    
    public function fav() {

        $urlPaths = getUrlPaths();
        if(!isset($urlPaths[2])) {
            exit();
        }

        $param = [
            "ifeed" => intval($urlPaths[2]),
            "iuser" => getIuser()
        ];
        //print $urlPaths[2];

        switch(getMethod()) {

            case _POST:
                
                //$this->model->insFeedFav($param);
                return [_RESULT => $this->model->insFeedFav($param)];
            
            case _DELETE:

                //$this->model->delFeedFav($param);
                return [_RESULT => $this->model->delFeedFav($param)];
        }
    }

}
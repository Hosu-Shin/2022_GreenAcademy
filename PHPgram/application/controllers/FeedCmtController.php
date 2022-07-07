<?php
    namespace application\controllers;

    class FeedCmtController extends Controller {

        public function index() {
            switch(getMethod()) {
                case _POST:
                    $json = getJson();
                    $json['iuser'] = getIuser();
                
                //댓글 공백 등록 금지 처리
                    $param = [ "cmt" => $json['cmt']];
                    $cmt = preg_replace("/\s+/", "",$json['cmt']);
                    
                    if(!empty($cmt)) {
                       return [_RESULT => $this->model->insFeedCmt($json)];
                    } 
                    
                    // return [_RESULT => $this->model->insFeedCmt($json)];
            
                case _GET:
                    $ifeed = isset($_GET["ifeed"]) ? intval($_GET["ifeed"]) : 0;
                    $param = [ "ifeed" => $ifeed ];
                    
                    return $this->model->selFeedCmtList($param);
            }
        }
    }
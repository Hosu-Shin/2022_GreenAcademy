<?php
    namespace application\controllers;

    use application\models\BoardModel;
    
    class BoardController extends Controller {
        public function list() {
            $model = new BoardModel();
            //$this->list = $model->selBoardList();
            $this->addAttribute("title", "리스트");
            $this->addAttribute("list", $model->selBoardList());
            $this->addAttribute("js", ["board/list"]);

            return "board/list.php"; //view 파일명!
        }

        public function detail() {
            $i_board = $_GET["i_board"];
            
            $model = new BoardModel();
            $param = [
                "i_board" => $i_board
            ];

            $this->addAttribute("data", $model->selBoard($param));
            $this->addAttribute("js", ["board/detail"]);

            return "board/detail.php";

            //글번호, 제목, 내용, 글쓴이 이름, 작성일
        }

    }
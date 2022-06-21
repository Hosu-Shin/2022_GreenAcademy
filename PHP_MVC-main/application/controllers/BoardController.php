<?php
    namespace application\controllers;

    use application\models\BoardModel;
    
    class BoardController extends Controller {
        public function list() {
            $model = new BoardModel();
            //$this->list = $model->selBoardList();
            $this->addAttribute("title", "리스트");
            $this->addAttribute("list", $model->selBoardList());
            $this->addAttribute("js", ["board/list"]); //파일을 여러개 보내야 할 경우가 있을 거기 때문에 배열로 만듬

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

        public function del() {
            $i_board = $_GET["i_board"];

            $model = new BoardModel();
            $param = [
                "i_board" => $i_board
            ];

            $this->addAttribute("data", $model->delBoard($param));

            return "redirect:/board/list";
        }

    }

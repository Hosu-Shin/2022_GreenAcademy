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

            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/list.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            //return "board/list.php"; //view 파일명!
            return "template/t1.php";
        }

        public function detail() {
            $i_board = $_GET["i_board"];
            
            $model = new BoardModel();
            $param = [
                "i_board" => $i_board
            ];

            $this->addAttribute("data", $model->selBoard($param));
            $this->addAttribute("js", ["board/detail"]);

            $this->addAttribute("title", "디테일");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/detail.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));

            return "template/t1.php";
            //return "board/detail.php"; //열어야 될 화면의 경로

            //글번호, 제목, 내용, 글쓴이 이름, 작성일
        }

        public function del() {
            $i_board = $_GET["i_board"];

            $model = new BoardModel();
            $param = [
                "i_board" => $i_board
            ];

            $this->addAttribute("data", $model->delBoard($param));

            return "redirect:/board/list"; //이동해야 할 화면의 주소값
        }

        public function mod() {
            $i_board = $_GET["i_board"];

            $model = new BoardModel();
            $param = [
                "i_board" => $i_board
            ];
            $this->addAttribute("data", $model->selBoard($param));

            $this->addAttribute(_TITLE, "수정");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/mod.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));

            return "template/t1.php";
        }

        public function modProc() {
            $i_board = $_POST["i_board"];
            $title = $_POST["title"];
            $ctnt = $_POST["ctnt"];

            $param = [
                "i_board" => $i_board,
                "title" => $title,
                "ctnt" => $ctnt
            ];
            
            $model = new BoardModel();
            $model->updBoard($param);
            //$this->addAttribute("data", $model->updBoard($param));
            
            return "redirect:/board/detail?i_board=$i_board";
        }

        public function write() {
            
            $this->addAttribute(_TITLE, "글쓰기");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/write.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            
            return "template/t1.php";
        }

        public function writeProc() {
            $writer = $_SESSION[_LOGINUSER]->i_user;
            //_LOGINUSER의 값은 t_user 테이블의 내용을 가지고 있는 객체!!!!! 
            
            $title = $_POST["title"];
            $ctnt = $_POST["ctnt"];

            $param = [
                "writer" => $writer,
                "title" => $title,
                "ctnt" => $ctnt
            ];

            $model = new BoardModel();
            $model->insBoard($param);
            
            return "redirect:/board/list";
        }

    }

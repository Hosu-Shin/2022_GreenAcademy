<?php
namespace application\models;
use PDO;

class BoardModel extends Model {

    public function selBoardList() {
        $sql = "SELECT i_board, title, created_at FROM t_board ORDER BY i_board DESC";
        $stmt = $this->pdo->prepare($sql);
        //prepare : DB쿼리문을 수정할때 굉장히 유용하다
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        //fetchAll : 여러 줄(배열로 넘어 올 것이다),    fetch : 한 줄(객체로 넘어올 것이다)
        //::FETCH_OBJ빼면 배열로 넘어오고, 넣으면 객체로 넘어옴
    }

    public function selBoard(&$param) {
        $sql = "SELECT A.i_board, A.title, A.ctnt, A.writer, A.created_at, A.file,
                B.nm 
                FROM t_board A 
                INNER JOIN t_user B
                ON A.writer = B.i_user
                WHERE A.i_board = :i_board";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function delBoard(&$param) {
        $sql = "DELETE FROM t_board WHERE i_board = :i_board";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        
        return $stmt->execute();
    }

    public function updBoard(&$param) {
        $sql = "UPDATE t_board 
                SET
                title = :title,
                ctnt = :ctnt
                WHERE i_board = :i_board";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->bindValue(':title', $param["title"]);
        $stmt->bindValue(':ctnt', $param["ctnt"]);
        return $stmt->execute();
    }

    public function insBoard(&$param) {
        $sql = "INSERT INTO t_board
                (writer, title, ctnt)
                VALUES
                (:writer, :title, :ctnt)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':writer', $param["writer"]);
        $stmt->bindValue(':title', $param["title"]);
        $stmt->bindValue(':ctnt', $param["ctnt"]);
        
        return $stmt->execute();
    }
}

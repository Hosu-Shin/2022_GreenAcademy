<?php

    include_once "db.php";

    function ins_board(&$param) {
        $writer = $param["writer"];
        $title = $param["title"];
        $ctnt = $param["ctnt"];
        $file = $param["file"];

        $sql = 
        "   INSERT INTO t_board
            (title, ctnt, writer, file)
            VALUES
            ('$title', '$ctnt', '$writer', '$file')
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function sel_paging_count(&$param) {
        $row_count = $param['row_count'];
        $sql = "SELECT CEIL(COUNT(i_board) / $row_count) as cnt
                  FROM t_board";
        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn); 
        $row = mysqli_fetch_assoc($result);
        return $row['cnt'];
    }

    function sel_board_list(&$param){

        $i_board = $param["i_board"];
        $writer = $param["writer"];
        $title = $param["title"];
        $ctnt = $param["ctnt"];

        $conn = get_conn();

        $sql = " SELECT A.i_board, A.title, A.created_at,
                        B.nm
                 FROM t_board A
                 INNER JOIN t_user B 
                 ON A.writer = B.i_user
                 ORDER BY A.i_board DESC;
                ";
                
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return $result;
        
    }
    
    

    function sel_board_list2(&$param) { 
        //부분만 필요하면 sel_board_list($param)을 쓰는게 맞지만 지금은 전체 다 필요하기 때문에 딱히 필요 없음

        $conn = get_conn();

        $start_idx = $param['start_idx'];
        $row_count = $param['row_count'];

        $sql = " SELECT A.i_board, A.title, A.created_at,
                        B.nm
                 FROM t_board A
                 INNER JOIN t_user B 
                 ON A.writer = B.i_user
                 ORDER BY A.i_board DESC
                 LIMIT $start_idx, $row_count
                ";
                
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return $result;
        
    }

    function sel_board2($param){
        $i_board = $param['i_board'];
        // $title = $param['title'];
        // $ctnt = $param['ctnt'];
        // $writer = $param['writer'];
        // $created_at = $param['created_at'];

        $conn = get_conn();
        $sql = "SELECT * FROM t_board
                WHERE i_board = '${i_board}';";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);


        return $result;
    }
    
        function sel_board(&$param) {
            $i_board = $param["i_board"];

            $sql = "SELECT A.title, A.ctnt, A.created_at, A.file
                        , B.nm, B.i_user
                    FROM t_board A
                    INNER JOIN t_user B
                        ON A.writer = B.i_user
                    WHERE A.i_board = $i_board
                    ";

            $conn = get_conn();
            $result = mysqli_query($conn, $sql);

        mysqli_close($conn);    

        return mysqli_fetch_assoc($result);
    }

        //최신글
        function sel_prev_board(&$param) {
            $i_board = $param['i_board'];
            $sql = "SELECT i_board 
                    FROM t_board
                    WHERE i_board > $i_board
                    ORDER BY i_board
                    LIMIT 1
                    ";
            $conn = get_conn();
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            $row = mysqli_fetch_assoc($result);
            if($row) {
                return $row['i_board'];
            }
            return 0;
            // $prev_num = $i_board + 1;
            
        }
        //지난글
        function sel_next_board(&$param) {
            $i_board = $param['i_board'];
            $sql = "SELECT i_board 
                    FROM t_board
                    WHERE i_board < $i_board
                    ORDER BY i_board DESC
                    LIMIT 1
                    ";
            $conn = get_conn();
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            $row = mysqli_fetch_assoc($result);
            if($row) {
                return $row['i_board'];
            }
            return 0;
            
        }

        function upd_board(&$param) {

            $i_board = $param['i_board'];
            $i_user = $param['i_user'];
            $title = $param['title'];
            $ctnt = $param['ctnt'];

            $sql = " UPDATE t_board SET
                    title = '$title',
                    ctnt = '$ctnt',
                    updated_at = now()
                    WHERE
                    i_board = $i_board
                    AND
                    writer = $i_user
                    ";


            $conn = get_conn();
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);

            return $result;

        }

        function del_board(&$param) {
            $i_board = $param['i_board'];
            $i_user = $param['i_user'];

            $sql = " DELETE FROM t_board
                    WHERE i_board = $i_board
                    AND writer = $i_user
                    ";
            
            $conn = get_conn();
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);

            return $result;
        }



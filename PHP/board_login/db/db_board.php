<?php

    include_once "db.php";

    function ins_board(&$param) {
        $writer = $param["writer"];
        $title = $param["title"];
        $ctnt = $param["ctnt"];
        $folder = $param["fileName"];

        $sql = 
        "   INSERT INTO t_board
            (title, ctnt, writer, file)
            VALUES
            ('$title', '$ctnt', '$writer', '$folder')
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function sel_paging_count(&$param) {
        $row_count = $param['row_count'];
        $sql = "SELECT CEIL(COUNT(i_board) / {$param['row_count']}) as cnt
                  FROM t_board";

        if($param["search_txt"] !== "") {
            $sql .= " WHERE title LIKE '%{$param["search_txt"]}%' ";             
        }
        
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
        $search_txt = $param['search_txt'];

        $sql = " SELECT A.i_board, A.title,
                        date(A.created_at) as date, time(A.created_at) as time,
                        A.view,
                        B.nm,
                        B.profile_img,
                        B.i_user
                 FROM t_board A
                 INNER JOIN t_user B 
                 ON A.writer = B.i_user
                 WHERE A.title LIKE '%{$param['search_txt']}%'
                 ORDER BY A.i_board DESC 
                 LIMIT {$param['start_idx']}, {$param['row_count']}
                ";
                
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return $result;
        
    }

    // function select_check($row_count, $count) {
    //     if($row_count == $count) {
    //         echo "<option value=".$count."selected>";
    //     } else {
    //         echo "<option value=".$count.">";
    //     }
    // }

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

            $sql = "SELECT A.title, A.ctnt, A.created_at, A.file, A.view
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

        function search_board(&$param) {
            $conn = get_conn();
            $search_select = $param['search_select'];
            $search_input_txt = $param['search_input_txt'];
            $textArray = explode(" ", $search_input_txt); //검색어를 공백으로 나눈다

            $where = []; //sql검색 시 열(속성) 이름
            $sql = "SELECT A.i_board, A.title,date(A.created_at) as date, time(A.created_at) as time,
                    B.i_user, B.nm
                    FROM t_board A
                    INNER JOIN t_user B 
                    ON A.writer = B.i_user
                    WHERE 
                    ";

            switch($search_select) {
                case "search_writer":
                    $where += ["B.nm"]; //i_user의 nm
                    break;
                case "search_title":
                    $where += ["A.title"]; //t_board의 title
                    break;
                case "search_ctnt":
                    $where += ["A.ctnt", "A.title"]; //t_board의 ctnt
                    break;
    
            }

            for ($i = 0; $i < count($textArray); $i++) {
                for ($j = 0; $j < count($where); $j++) {
                    $sql = $sql." $where[$j] LIKE '%{$textArray[$i]}%' ";

                    //마지막 검색어가 아니라면
                    if(($i !== count($textArray) - 1) || ($j !== count($where) -1)){ 
                        $sql = $sql. "OR";
                    }
                }
            }   
 
            // for ($i = 0; $i < count($textArray); $i++) {
            //     $sql = $sql." $where LIKE '%{$textArray[$i]}%' ";
            //     if($i !== count($textArray) - 1) { //마지막 검색어가 아니면
            //         $sql = $sql. "OR";
            //     }
            // }

            //print $sql;

            // echo $search_select."<br>";
            // echo $search_input_txt."<br>";
            // print_r($textArray);
            
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            return $result;

        }

        function visit() {
            $conn = get_conn();

            $YY = date('Y');
            $MM = date('m');
            $DD = date('d');

            $dat = $YY."-".$MM."-".$DD;

            $sql = " SELECT * FROM visit_db
            WHERE redate = '$dat'
            ";

            $result = mysqli_query($conn, $sql);

            $list = mysqli_num_rows($result);

            if(!$list) { 
                $count = 0; 
            } else { 
                $row = mysqli_fetch_array($result);
                $count = $row['count'];
            }

            if($count === 0) {
                $count++;
                
                $sql = "INSERT INTO visit_db
                        VALUES ($count, '$dat')
                        ";
            } else {
                $count++;
                
                $sql = "UPDATE visit_db
                        SET count = $count
                        WHERE redate = '$dat'
                        ";
            }
        
            mysqli_query($conn, $sql);
            
            $totalQurey = "SELECT SUM(count) FROM visit_db";
            $totalCount = mysqli_fetch_array(mysqli_query($conn, $totalQurey))[0];
            mysqli_close(($conn));
            
            return array($count, $totalCount);
        }

        function view(&$param) {
            $conn = get_conn();
            $i_board = $param['i_board'];

            $sql = "UPDATE t_board
                    SET view = view+1
                    WHERE i_board = $i_board
                    ";
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);

            return $result;
        }
        
        function comment(&$param) {
            $conn = get_conn();

            $i_board = $param['i_board'];

            $sql = "SELECT A.*, B.nm
                    FROM t_comment A
                    INNER JOIN t_user B
                    ON A.i_user = B.i_user
                    WHERE A.i_board = '$i_board'
                    ";
            
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);

            return $result;

        }


        function ins_comment(&$param){
            $conn = get_conn();

            $i_board = $param['i_board'];
            $i_user = $param['i_user'];
            $ctnt = $param['ctnt'];

            $sql = "INSERT INTO t_comment
                    (i_board, i_user, ctnt)
                    VALUES 
                    ('$i_board', '$i_user', '$ctnt')
                    ";
            print $sql;
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            return $result;
        }

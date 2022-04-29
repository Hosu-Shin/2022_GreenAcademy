<?php
    include_once "db.php";

    function ins_join(&$param){ //join으로 썼을 경우 중복되어서 에러났음 그래서 user_join으로 바꿈

        $uid = $param['uid'];
        $upw = $param['upw'];
        $nm = $param['nm'];
        $gender = $param['gender'];

        $conn = get_conn();
        $sql = " INSERT INTO t_user
                (uid, upw, nm, gender)
                Values
                ('$uid', '$upw', '$nm', $gender)
                ";   

        $result = mysqli_query($conn, $sql); //insert는 빈칸 아니면 1 (True or False)가 넘어온다
        mysqli_close($conn);

        return $result;
    }

    function sel_user(&$param) { //&를 줘야 주소값이 넘어간다
        $uid = $param["uid"];
        $sql = 
        "   SELECT i_user, uid, upw, nm, gender
            FROM t_user
            WHERE uid = '$uid'
        ";
        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return mysqli_fetch_assoc($result); //배열로 안 가져오면 로그인 안됩니다
     }

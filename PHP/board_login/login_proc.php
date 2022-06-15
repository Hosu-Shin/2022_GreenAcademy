<?php
    //login.php 에서 넘어오는 값을 적절한 변수에 담는다.
    // 변수의 값을 출력

   
    include_once "db/db_user.php";
    //login.php 에서 넘어오는 값을 적절한 변수에 담는다.
    //변수의 값을 출력.

    $uid = $_POST["uid"]; //login.php의 값을 가져오기 위해 작성
    $upw = $_POST["upw"]; //_POST는 문자열로 가져옴

    echo "uid : ", $uid, "<br>";
    echo "upw : ", $upw, "<br>";

    $param = [ // 배열화 시킴
        "uid" => $uid 
    ];

    $result = sel_user($param);
    if(empty($result)) { 
        echo "해당하는 아이디 없음";
        die;
    }

    echo "i_user : " , $result["i_user"], "<br>";
    echo "pw : " , $result["upw"], "<br>";   

    //비밀번호가 맞으면  "list.php로 이동"
    //비밀번호가 다르면 "login.php로 이동"

    /*
    if($upw !== $result["upw"]) {  // ===으로 사용해도 무관하다
        header("Location: login.php");
        
    } else {
        header("Location: list.php");
    }
    */

    if($upw === $result["upw"]) { //로그인 성공!!
        session_start();
        $_SESSION["login_user"] = $result;
        header("Location: list.php");
    } else {
        header("Location: login.php");
    }

    /*변수 하나에는 값이 하나만 들어갈 수 있다
      1) 리터럴 (값 그 자체) : 하나의 값만 들어갈 수 있음
      2) 주소값 (배열) : 한 개의 주소값인데 그 주소값 안에 어마어마한 값을이 있을 수 있다 
                        여러 값들을 담아 둘 수 있는 쟁반 같은 것
    */
    
<?php
    // function get_conn() {
        define("URL", "localhost");
        define("USERNAME", "root");
        define("PASSWORD", "506greendg@");
        define("DB_NAME", "board1");
    //     return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME);
    // }

    function get_conn(){
         return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME);
    }

    /*
    mysql를 사용하는 파일에는 이 내용을 다 적어줘야 한다
    include_once는 같은 파일에 "include_once"를 두 번 적어도 한 번만 실행되는 것이다.
    include는 여러개 출력됨
    
    
    include_once "db.php";
    "db.php"를 참조할 때 사용
    "db.php"안의 내용을 파일마다 계속 복사 붙여넣기 할 거라면 안 써도 괜찮지만 나중에 수정할 때 힘듬
    
    */
?>
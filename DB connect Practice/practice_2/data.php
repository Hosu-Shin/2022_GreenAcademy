<?php
    define("URL", "localhost"); 
    //key값이기 때문에 문자열임을 인지하기 위해 ""사용, ""없을 경우 변수명으로 인식할 가능성이 높아 에러뜸
    //define은 string 값을 써야 하는데 string이란 문자열을 의미한다
    define("USER", "root");
    define("PW", "506greendg@");
    define("DB_NAME", "board3");

    function DB(){
        return mysqli_connect(URL, USER, PW, DB_NAME);
    }

?>

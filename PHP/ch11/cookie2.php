<?php

    setcookie("country", "한국");
    echo "Country : ", $_COOKIE['country'], "<br>";

    $_COOKIE['country'] = "UK";
    echo "Country : ", $_COOKIE['country'], "<br>";

    //setcookie("country", "UK");  - 내 브라우저의 쿠키값까지 바꾸려면 setcookie를 사용해 따로 변경해 줘야한다

    /*
    unset($_COOKIE['country']);
    setcookie("country");
    //쿠키를 지우고 싶다면 이렇게 쓰도록 하자
    */

    echo "Country : ", $_COOKIE['country'], "<br>";
?>
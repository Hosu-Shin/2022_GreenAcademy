<?php

    session_start();
    print $_SESSION['g'];
    // 브라우저 창을 끄고 새로 켜서 page4.php로 이동하면 기존의 SESSION변수는 사라져있다.
    // 그래서 page3에 들렸다가 page4에 오면 SESSION변수 할당이 새롭게 된다

    $a = 10;

    echo $_SESSION['g'] , ', ' , $a;

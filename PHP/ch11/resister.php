<?php

    // session_start(); - session start를 브라우저에 한 번 적용 시키면 굳이 쓰지 않아도 된다
    session_start();
    $_SESSION['var1'] = "v1";
    $_SESSION['var2'] = "v2";

    //unset($_SESSION['var2']); - var2라는 공간을 없애는 것임

    //session_destroy();

    echo $_SESSION['var1'] , "<br>";
    echo $_SESSION['var2'] , "<br>";
?>

<a href = "session_destroy.php">destroy</a>
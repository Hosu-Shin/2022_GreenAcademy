<?php

        setcookie("country", "Korea");
        if(isset($_COOKIE['country'])){
            echo "Country : ", $_COOKIE['country'], "<br>";
        }
        //isset으로 쿠키값이 있는지를 우선 확인한다
?>

<a href = "cookie2.php">Next Page</a>
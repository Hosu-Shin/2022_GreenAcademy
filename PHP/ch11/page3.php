<?php

    session_start();
    $_SESSION['g'] = "This is a Global variable";
    //SESSION은 브라우저 마다 할당됨

?>

<a href = "page4.php">Next Page</a>
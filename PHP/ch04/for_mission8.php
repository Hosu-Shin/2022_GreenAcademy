<?php
    /*
    문제.
    만약에 star 값이 2 라면
    **
    **
    두 줄 별 2개

    만약에 star 값이 4라면
    ****
    ****
    ****
    ****
    네줄 별 4개

    */

    $star = rand(2, 10);
    echo "STAR : $star" . "<br>";
    for ($i = $num ; $i < $star ; $i++)
    {
        for ( $num = 1 ; $num <= $star ; $num++)
        {
            echo "*";
        }
        echo "<br>";
    }
     echo "<br>";
    
    /*
    for ($z = 0 ; $z < $star ; $z++)
    {
        for ($i = 0 ; $i < $star ; $i++)
        {
            echo "*";
        }
        echo "<br>";
    }
    */

?>
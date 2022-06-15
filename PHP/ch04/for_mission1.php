<?php

    /*
    문제 1.
    1 ~ 20까지 오른쪽 방향으로 찍히게 해주세요
    */

    for($num = 1 ; $num < 21 ; $num++)
    {
        echo $num;
    }
    
    echo "<br>";

    /* 
    문제 2. 위 결과에서 $num=0을 수정하지 않고 같은 결과 값을 출력하시오.
    */
    for($num = 0 ; $num < 20 ; $num++)
    {
        echo $num + 1 . " ";
    }
    
    echo "<br>";

    /* 
    문제 3. 위 결과에서 $num < 50을 수정하지 않고 같은 결과 값을 출력하시오.
    */
    for($num = 30 ; $num < 50 ; $num++)
    {
        echo $num - 29;
    }
?>
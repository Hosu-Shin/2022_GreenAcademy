<?php
    /*
    문제)
       rand(1,10)실행을 시킬건데 10이 나올때 까지 반복한다
       10이 아니면 숫자를 찍는다
       10이 나오면 반복을 멈추고 "끝" 출력!
    */

    $r_val = rand(1, 10);
    echo "r_val : $r_val <br>";

    echo " 시작 <br>";
    $r_val = rand(1,10);

    while(true) // 아무 값을 줘서 무한 루프 만듬
    {
        $r_val = rand(1, 10);
        if($r_val == 10) {break;}
        echo "r_val : $r_val <br>";
    }
    echo " 끝 <br>";

   
    echo "--------------<br>";

    
?>
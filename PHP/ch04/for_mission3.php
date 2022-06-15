<?php
    /*
    문제 5. for문을 활용해서 1~100을 더한 값을 구하시오
    더한 값 5050을 출력하시오
    */
    $sum = 0;
    for ($num = 1 ; $num <=100 ; $num++)
    {
        $sum+=$num;
        //$sum = $sum+$num;

        /*
        for ($num=1; $num<=100)
        {
            $sum += $num++
        }
        */
    }
    echo $sum;
?>
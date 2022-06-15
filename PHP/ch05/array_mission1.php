<?php
    /*
    문제)
        합계: ?
        평균: ?
    */

    $score_arr = array(100, 90, 33, 87, 65);

    $sum = $score_arr[0] + $score_arr[1] + $score_arr[2] + $score_arr[3] + $score_arr[4];
    echo $sum;
    
    echo "<br>";

    $avr = $sum/5;
    echo $avr;

    echo "<div>---</div>";

    $sum = array_sum($score_arr);
    $avg = array_sum($score_arr) / count($score_arr);
    
    echo $sum, "<br>";
    echo $avg;

    echo "<div>---</div>";

    //강사님 답
    $sum = 0;
    $len = count($score_arr);
    for ($i=0 ; $i<$len ; $i++)
    {
        $sum += $score_arr[$i];
    }
    $avg = $sum / $len;

    echo "합계 : $sum <br>";
    echo "평균 : $avg";
?>
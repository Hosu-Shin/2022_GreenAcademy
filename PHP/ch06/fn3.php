<?php
/*
문제) 숫자 10(는)은 짝수입니다
      숫자 1(는) 홀수입니다.
*/

    $start_num = 1;
    $end_num = 50;
    
    $result = sum_from_to($start_num, $end_num);

    print "$start_num ~ $end_num 을(를) 모두 더한 값은 $result <br>";

    function sum_from_to($n1, $n2){
        $sum=0;
        for ($n1 = 1 ; $n1 <= $n2 ; $n1++)
        {
            $sum+=$n1;
        }
        return $sum; //return을 해 줘야 값이 function안에 들어감
    }

    

?>

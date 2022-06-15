<?php
/*
문제) 숫자 10(는)은 짝수입니다
      숫자 1(는) 홀수입니다.
*/

    $num = rand(1, 10);

    print_odd_even($num);
    
    function print_odd_even($n){
        
        $result = $n % 2 === 0? "짝" : "홀";
        print "숫자 ${n} (는)은 ${result}수입니다.";
}

function odd_even($n)
    {
        $odd_even = "홀";

        if($n % 2 == 0 ) {
            $odd_even = "짝";
        }
        print "숫자 ${n}은(는) ${odd_even}수입니다.";
}

?>
<?php
    $num = 11;

    /*
    문제 1.
    10은(는) 짝수입니다
    11은(는) 홀수 입니다
    */

    if($num%2 == 0)
    {
        print $num . "은(는) 짝수입니다.";
    }
    else
    {
        print $num . "은(는) 홀수입니다.";
    }
print "<br>";
    if ($num % 2 === 0)
    {
        print "${num}는(은) 짝수입니다.";
    }
    else
    {
        print "${num}는(은) 홀수입니다.";
    }

?>

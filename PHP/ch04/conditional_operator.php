<?php
//조건 연산자 : 3항식 (if...else 문을 간단하게 만든 것)
    $num = 11;

    print "${num}는(은) " . ($num % 2 === 0 ? "짝" : "홀") . "수입니다.";

    // ? 를 기준으로 앞의 연산이 true면 : 앞의 값 (짝), false면 : 뒤의 값 (홀)

    /*
    print "${num}는(은) " . ($num % 2 === 0 ? "짝" : "홀") . "수입니다."
    print "10는(은) " . ($num % 2 === 0 ? "짝" : "홀") . "수입니다."
    print "10는(은) " . "짝" . "수입니다."
    print "10는(은)짝" . "수입니다."
    print "10는(은)짝수입니다."
    */
?>
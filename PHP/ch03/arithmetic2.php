<?php
    // 증감 연산자
    $n1 = 10;

    $n1++;
    print "$n1 <br>";
// n1++을 해서 11을 만들고
// ++ 은 정수만 가능하다

    ++$n1;
    print "$n1 <br>";
// n1++가 11이 된 상태에서 ++를 해서 12를 만들었다.

//++는 +1을 뜻한다 (숫자에 사용 가능)

    print "-------------------<br>";

    $n2 = 10;
    $sum = 10 + $n2++;
// 연산과 ++을 함께 쓸 경우에는 ++의 위치에 따라 연산 순서가 달라미지 때문에 값이 달라진다
    print "$sum <br>";
    print "$n2 <br>";

    print "-------------------<br>";

    $n3 = 10;
    $n3 = $n3 + 1; // $n3++;와 동일하다 (1씩 더할때는 ++ 사용하면 된다)
    print "$n3 <br>";
    
    print "-------------------<br>";

    $n4 = 10;
    $sum = 10 + ($n4 + 1);
    print "$sum <br>";
    print "$n4 <br>";

    print "-------------------<br>";

    $n5 = 10;
    $n5 += 2; //$n5 = $n5 + 2 이거랑 같음 (2씩 추가)
    print "$n5 <br>";

    print "-------------------<br>";

    $oprd1 = '10';
    $oprd2 = 10;

    $result = $oprd1 == $oprd2;
    print "$oprd1 == $oprd2 : $result <br>";
    
    $result = $oprd1 === $oprd2;
    print "$oprd1 === $oprd2 : $result <br>";

    $result = $oprd1 != $oprd2;
    print "$oprd1 != $oprd2 : $result <br>";

    $result = $oprd1 > $oprd2;
    print "$oprd1 > $oprd2 : $result <br>";
// false 값은 공백으로 뜸
// == 은 타입이 달라도 값이 동일한 값이면 맞다고 해줌 
// === 은 타입과 값이 모두 동일해야 한다
// ! (not) 은 반대라고 생각하면 됨

?>
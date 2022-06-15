<?php

// for문은 내가 몇 번 반복할지 정하는 것이다.

    for( $i = 0 ; $i < 10 ; $i++ )
    {
        print "$i <br>"; //내용
    }
    print "- 끝 -";
/* $i 값은 0부터 시작되며, ++로 증가될 것이다.
    $i의 최초값은 0 → $i <10 을 만족하여 True → 내용 실행 → $i에 ++를 (+1) 한다
    → $i는 1이 된다 → 1이 된 $i 는 < 10 을 만족하여 True → 다시 내용 → ++
    → < 10을 만족하지 않을 때까지 반복
    → for문의 내용을 모두 마친 후에 print "-끝-"을 출력한다
*/
/*
        A B C
    for( ; ; )
    {
    }
    A : 초기화 공간 (시작 값) , 최초의 딱 한번만 실행됨
    B : 반복 비교문 (몇 번까지 할 지 범위 지정)
    C : 증감식 (몇 씩 추가 할지)

실행 순서 : A > B > 내용 > C 
             > B > 내용 > C
             > B > 내용 > C
        ...B가 false가 될 때까지 반복
*/

?>
<?php
    $array = array(100, 200, 300, 400, 500);
                //  0    1    2    3    4

    foreach($array as $val) //다른 언어는 순서가 반대임, 배열 먼저 적고 값 넣음
    // foreach ([where의 주소값] as [변수값])
    /*
    $val에 차례대로 100, 200, 300, 400, 500이 들어감
    */
    {
        print $val . "<br>";
    }
    print "---------------<br>";

    foreach($array as $key => $val) //변수명($key, $val)은 아무거나 해도 됨
    {
        print $key . " : " . $val . "<br>";
    }
    print "---------------<br>";

?>
<?php
    if(isset($name)) {
        print "name is ok!!";
    } //$name에 값을 넣어주지 않았기 때문에 아무것도 출력되지 않는다
   
    $name = "홍길동"; //$name에게 값을 할당해 준다
    if(isset($name)) {
        print "name is awsome!! <br>";
        print $name . "<br>";
        print isset($name); //isset : 변수가 존재하고 null이 아닌 값을 가지고 있으면 True를 리턴한다 (1을 출력함), 그 외에는 false
    }

    unset($name); //변수 해제 : 변수를 파괴하는 것으로, 아예 존재하지 않도록 만듬
    print $name . "<br>";

    print "The end";

?>
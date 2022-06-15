<?php
    $arr_age = array(
      "Peter" => 35,
      "Ben" => 37,
      "Joe" => 43,
      "John" => 24
    );

    //배열 안의 값 정렬
    //sort(오름차순). rsort(내림차순)

    $copy_arr_1 = $arr_age; //copy본은 클론임
    print "copy : ";
    print_r ($copy_arr_1);
    print "<br>";

    rsort($copy_arr_1);
    
    print "origin : "; //origin은 그대로인 걸 확인할 수 있다
    print_r($arr_age);
    print "<br>";
    print "rsort : "; //origin과 copy 둘은 별개임
    print_r($copy_arr_1);
    print "<br>------------------------<br>";

    //키 정렬
    // ksort(오름차순), krsort(내림차순)

    $copy_arr_2 = $arr_age;
    print "copy2 : ";
    print_r ($copy_arr_2);
    print "<br>";

    ksort($copy_arr_2);

    print "ksort : ";
    print_r($copy_arr_2);
    print "<br>";

?>
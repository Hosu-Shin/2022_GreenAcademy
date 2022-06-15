<?php
    $arr_age = array(
      "Peter" => 35,
      "Ben" => 37,
      "Joe" => 43,
      "John" => 24
    );

    asort($arr_age);

    print_r($arr_age);

    //배열을 값으로 정렬하고 인덱스와의 상관관계 유지
?>
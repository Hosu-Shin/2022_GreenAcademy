<?php
    $arr1 = [1, 2, 3, 4, 5];
    $arr2 = [1, 2, 3, 6, 7];
    $arr3 = [1, 2, 3, 4, 5];

    $diff_arr = array_diff($arr1, $arr2);
    /*diff_arr은 서로를 비교하는 것으로
      arr1을 기준으로 arr2와 비교해서, arr2가 가지고 있지 않은 것을 비교해 출력한다
    */
    print_r($diff_arr);
    print "<br>";

    print ($arr1 === $arr2) . "<br>";
    print ($arr1 === $arr3) . "<br>";
    //자바는 === 비교 사용 불가
?>
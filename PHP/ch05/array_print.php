<?php
    $numbers =array(10, 20, 30, 40, 50);

    print $numbers . "<br>";
    print_r ($numbers) . "<br>";
    print "<br>";
    // print_r은 소괄호를 해 줘야 한다
    //br 태그를 사용할 수 가 없다

    array_push($numbers, 60, 100, 200);
    print_r($numbers);
    print "<br>";
?>
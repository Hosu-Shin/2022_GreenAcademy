<?php

    $data = file("./name.txt");

    print_r($data);
    print "<br>--------------------------------------------<br>";

    //explode() : 문자열을 분할하여 배열로 저장하는 함수
    //explode( delimiter, string[, limit])
        //delimiter : 문자열을 분할할 기준을 정한다
        //string : 분할할 문자열
        //limit : 옵션

    foreach($data as $line) {
        $div = explode(" ", $line);
        //print_r($div);
        //print "[" . $div[0] . "] " . $div[1] . "<br>";
        print "Name : {$div[0]}, Major : {$div[1]} <br>";
    }

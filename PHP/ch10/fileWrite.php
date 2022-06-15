<?php
    //w모드인 상태로, 경로에 새로운 파일 이름을 적으면, 해당 이름의 파일이 생성된다
    $filep = fopen("../lorem.txt", "a");

    if(!$filep) {
        die ("파일을 열 수 없습니다.");
    }
    print "파일을 열었습니다.<br>";

    //escape문자 \n  \t

    fputs($filep, "\nRomeo : I take thee at thy word");

    fclose($filep);
<?php
    //fopen : 파일 입출력
    //fopen("파일 경로와 이름","어떤 식으로 오픈 할 것인기 (읽기, 쓰기, 둘다)")
    $filep = fopen("../lorem.txt", "r");

    if(!$filep) {
        die ("파일을 열 수 없습니다.");
    }
    print "파일을 열었습니다.<br>";

    while($line = fgets($filep, 100)) {
        print $line . "<br>";
    }

    fclose($filep);
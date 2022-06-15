<?php
    //exam6.txt 파일 읽어서 전부 대문자로 변경한 후
    //exam6_capital.txt에 저장해 주세요.

    $pfile = fopen("./exam6.txt", 'r');
    $newfile = fopen("./exam6_capital.txt", 'w');
    
    //fgetc : 파일의 한 문자를 읽음
    //fgets : 파일의 문자열을 읽음
    while($line = fgets($pfile)) { 
        //print $line . "<br>";
        echo strtoupper($line) . "<br>";
        fputs($newfile, strtoupper($line));
    }

    fclose($pfile);
    fclose($newfile);
    

//강사님 풀이
    $origin = file("./exam6.txt"); 
    $target = fopen("./exam6_capital.txt", "a"); //open

    foreach($origin as $line) {
        $capital = strtoupper($line);
        fputs($target, $capital);
    }
    fclose($target); //close

   
    

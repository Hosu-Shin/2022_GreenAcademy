<?php
    $score = 99;
/*
    진입을 하게 되면 break를 만날때 까지 출력하기 때문에 break를 꼭 끝에 써 주어야 한다
    switch($score)에서 $score값이 case 값과 무조건 동일해야 출력이 된다

    switch(1)의 1은 아무런 의미가 없고 이럴 경우, case ($score >= 90): 로 벌위를 지정할 수 있다
*/
    switch($score)
    {
        case 100: case 99:
            print $score;
            print "당신의 성적은 A입니다.";
            break;

        // case ($score>=90):
        //     print "당신의 성적은 B+입니다.";
        //     break;
        
        case 80:
            print "당신의 성적은 B입니다.";
            break;
        
        case 60:
            print "당신의 성적은 C입니다.";
            break;
        
        case 0:
            print "당신의 성적은 F입니다.";
            break;

    }
?>

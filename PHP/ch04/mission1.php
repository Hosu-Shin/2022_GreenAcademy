<?php
    /*
    문제.
        90점 이상 A (3점 이하는, "-", 7점 이상은 "+")
        ex) 93 => A-, 95 = A , 98 => A+
        80점 이상 B (3점 이하는, "-", 7점 이상은 "+")
        70점 이상 C (3점 이하는, "-", 7점 이상은 "+")
        60점 이상 D (3점 이하는, "-", 7점 이상은 "+")
        60점 미만 F
        
        0 ~ 100 점수가 아니면 "잘못된 값" 출력
    */
    $score = rand(0, 120);



        if($score <= 120 && $score > 100)
        {
            echo " 잘못된 값 ($score)";
        }
    else if ($score <= 100 && $score >= 90)
    echo "A ($score)";
    
    else if ($score < 90 && $score >= 80)
    echo "B ($score)";
    
    else if ($score < 80 && $score >= 70)
    echo "C ($score)";
    
    else if ($score < 70 && $score >= 60)
     echo "D ($score)";
    
    else if ($score < 60)
    echo "F ($score)";
    
    echo "<br>";

    echo "점수 : $score <br>";


    echo "------------------------------------<br>";
    
    $score = rand(0, 120);
    print "점수 : $score <br>";
    
    if($score > 100 || $score < 0) 
    {
        print "잘못된 값";
    } 
    else 
    {
        $sign = "F";
        $symbol = "";
        $val_1 = intval($score / 10);   //intval 대신 floor을 사용해도 된다 (floor 내림, ceil 올림, round 반올림) 
        switch($val_1) 
        {
            case 10: case 9:
                $sign = "A";
                break;
            case 8:
                $sign = "B";
                break;
            case 7:
                $sign = "C";
                break;
            case 6:
                $sign = "D";
                break;
        }
        $val_2 = $score % 10;
        if($score > 60)
        {
            if($score === 100 || $val_2 >= 7)
            {
                $symbol = "+";
            } 
            else if($val_2 <= 3)
            {
                $symbol = "-";
            }
        }
        print $sign . $symbol;
    }
    echo "<br>";

    echo "------------------------------------<br>";


// 은지씨 답 

$score = rand(0, 120);
    print "점수 : $score <br>";
    $grap = "";     //등급 담는 변수
    $pm = "";       //+/- 담을 변수
    //등급 구분 하는 if문
    if (90 <= $score && $score <= 100)
    {
        $grap = "A";
    }
    elseif (80 <= $score && $score < 90)
    {
        $grap = "B";
    }
    elseif (70 <= $score && $score < 80)
    {
        $grap = "C";
    }
    elseif (60 <= $score && $score < 70)
    {
        $grap = "D";
        
    }
    elseif ($score < 60)
    {
        $grap = "F";
    }
    else 
    {
        print "잘못된 값";
    }

    //+/- 구분 하는 if문
    if (($score % 10 <= 3) && $score > 60 && $score < 100)
    {
        $pm = "-";
    }
    elseif (($score % 10 >= 7) && $score > 60 && $score < 100 || $score == 100)
    {
        $pm = "+";
    }
    //최종 결과값 출력
    print $grap . $pm;



?>

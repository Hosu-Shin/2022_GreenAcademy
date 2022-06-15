<?php
    /*
    문제)
        1부터 val 변수에 있는 숫자까지 모두 더해주세요
        그리고 결과값을 출력해 주세요
        while문으로 해결
    */

    //for ( 초기화 ; 조건식 ; 증감식 ) {}
    
    $val = rand(50,100);
    echo "val : $val <br>";

    $sum = 0;
    $num = 1;
    while($num <= $val)
    {
        $sum+=$num;
        $num++;
    }
    echo "<div> 합계 : ", $sum , "</div>";

    $sum = 0;
    for($num = 1 ; $num <= $val ; $num++)
    {
        $sum = $sum + $num;
    }
    echo "<div> for문 : ", $sum, "</div>";


    $sum = 0;
    while($val>0)
    {
        $sum+=$val;
        $val--;
    }
    echo "<div>", $sum, "</div>";



    /*
    $i = 0; // 초기화
    while($i < 10)
    {
        echo $i , "<br>"; // 내용
        $i++; // 증감식
    }

    $val = 100;
    $sum = 0;
    for($num = 1 ; $num <= $val ; $num++)
    {
        $sum+=$num;
    }
    echo "$num, $val : ", $sum;
    */

?>
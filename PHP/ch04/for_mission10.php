<?php
    /*
    문제.
    테이블 만들기

    */

    $val = rand(3,10);
    echo "Count = $val";

    $sum = 1;
    
    echo "<table border = 1.5, width = 300px> <tr align = 'center'>";
    for($num = 0 ; $num < $val ; $num++)  // 세로 갯수
    {   
        echo "<tr align = 'center'>";
        for($i = 0 ; $i < $val ; $i++)
        {
            echo "<td>", $sum++ , "</td>";  // 가로 갯수
        }
        echo "</tr>";
    }
    echo "</td>";

    /*
    echo "<table border = 1.5> <tr align = 'center'>";
    for($num = 1 ; $num <= $val ; $num++)
    {   
        echo "<tr align = 'center'>";
        for($i = 1 ; $i <= $val ; $i++)
        {
            echo "<td>", $num&$i , "</td>";
        }
        echo "</tr>";
    }
    echo "</td>";
    */

    // A값에 1 을 넣으면, B값에 <= , >= 처럼 "="을 넣어 줘야 한다
    // A값에 0 을 넣으면, B값에 "="없이 <,>를 넣으면 된다

?>
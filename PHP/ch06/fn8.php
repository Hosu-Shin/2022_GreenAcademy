<?php
    /*
    문제 : val수마다 테이블 행 열 만들기
    */
    $val = rand(2, 5);

    print_table($val);

    echo "count = $val <br>";

    function print_table($val){
        $sum = 0;
        echo "<table border = 1.5 cellpadding = '5'style = 'border-collapse:collapse'>
        <tr align = 'center'>";
        for($i = 0 ; $i < $val ; $i++){
            echo "<tr align = 'center'>";
            for($z = 0 ; $z < $val ; $z++){
                echo "<td>" , $sum+=1 , "</td>";
            }
            echo "</tr>";
        }
        echo "<table>";
    }

    //강사님 답
    function print_table2($val){
        $num=1;
        print "<table>";
            for($i = 0 ; $i < $val ; $i++){
                print "<tr>";
                for($z = 0 ; $z < $val ; $z++){
                    print "<td>";
                    print $num++;   
                    print "</td>";
                }
                print "</tr>";
            }
            print "</table>";
    }
?>
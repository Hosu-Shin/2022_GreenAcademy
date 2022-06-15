<?php
    /*
    문제.9
    수만큼 별 출력
    */

    $star = rand(1, 10);
    echo "<table border = 1 > <tr align = 'center'>";
        for($a = 1 ; $a < 2 ; $a++)
        {
            echo "<td>", "STAR : $star", "</td>";
        }
        echo "</tr>";

        for($num = 1 ; $num <= $star ; $num++)
    
        {
            print "*";
        }
       
        print "<br>";
    
    /*
    $star = rand(1,10);
        print "star : $star <br>";
            for($i=$star ; $i > 0 ; $i--)
            {
                print "*";
            }
        print "<br>";
    */

?>
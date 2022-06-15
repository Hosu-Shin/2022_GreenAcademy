<?php
    $dan = rand(2, 9);

    // echo $dan;

    /*
    문제 4.
    구구단 만들기
    */
    
    for($num = 1 ; $num < 10 ; $num++)
    {
        echo "<div>","$dan x $num = ",$dan*$num,"</div>";

        /* $result = $dan * $num;
        echo "$dan X $num = $result <br>"; */
    }
?>
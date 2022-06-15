<?php
    /*
    문제 7.
    구구단 찍기

    2 x 1 = 1
    2 x 2 = 4
    ...
    2 x 9 = 19
    -----------
    3 x 1 = 1
    3 x 2 = 6
    ...
    3 x 9 = 27
    -----------
    이런 식으로 아래로 쭉 나열되게 출력

    */
   
   
    for ($sum = 2 ; $sum < 10 ; $sum++)
    {
        for($num = 1 ; $num < 10 ; $num++)
        {
                echo "<div>","$sum x $num = ", $sum*$num,"</div>";
        }
        echo "------------------------<br>";
    }

    // for($sum = 2 ; $sum < 10 ; $sum++)
    // {
    //     if($sum > 2) {print "--------------<br>";}
    //     for($num = 1 ; $num < 10 ; $num++)
    //     {
    //         $result = $sum * $num;
    //         print "$sum x $num = $result <br>";
    //     }
    // }
?>
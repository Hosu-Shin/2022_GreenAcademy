<?php
    /*
    문제.
    만약에 star 값이 3이면
    *
    **
    ***

    만약에 star 값이 6이면
    *
    **
    ***
    ****
    *****
    ******

    */

    $star = rand(3, 10);
    echo "STAR : $star","<br>";
    
        for($a = 1 ; $a <= $star ; $a++) //$는 $star 값 만큼 반복한다 (줄 갯수)
        {
            for($b = 0 ; $b < $a ; $b++) //$b는 $a 만큼 반복한다 (별 갯수)
            {
                echo "3";
            }
            echo "<br>";
        }
        echo "<br>";
    
    


    /* $star = rand(2, 10);
     echo "STAR : $star" . "<br>";
     for ($i = 0 ; $i <= $star ; $i++)
     {
         for ( $num = 0 ; $num <= $star ; $num++)
         {
            
             if( $num < $i )
             {
                 echo "*";
             }
         }
         echo "<br>";
     }
      echo "<br>";
      */

        $sum = " ";
    for ($z = 1 ; $z <= $star ; $z++)
    {
        $sum = $sum."3";
        echo "{$sum}<br>";
    }

?>
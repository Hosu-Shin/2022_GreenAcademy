<?php
    /*
    문제 8.
    구구단 찍기

    2 x 1 = 1     3 x 1 = 1
    2 x 2 = 4     3 x 2 = 6
    ...           ...
    2 x 9 = 19    3 x 9 = 27
    
    이런 식으로 옆으로 쭉 나열되게 출력

    */
  
   
   for($sum = 2 ; $sum < 10 ; $sum++)
   {
        for($num = 1 ; $num < 10 ; $num++)
        {
            $result = $sum*$num;
            echo "$num x $sum = ","$result ";
        }
        echo "<br>";
   }

    echo "<table border = 1.5> <tr align='center'>";
        for($num = 2 ; $num < 10 ; $num++)
        {
            echo "<td>$num 단 </td>";
        }
        echo "</tr>";
        

        for($a = 1 ; $a < 10 ; $a++)
        {
            echo "<tr align = 'left'>";
            for ($b = 2 ; $b < 10 ; $b++)
            {
                $sum = $a*$b;
                echo "<td> $b x $a = $sum </td>";
            }
            echo "</tr>";
        }
        echo "</table>";


        /* 
       for($i = 1 ; $i < 10 ; $i++)
        {
            for( $z = 2 ; $z < 10 ; $z++)
            {
                $result = $z*$i;
                echo "${z}x${i}";
            }
            echo "<br>";
        }
        */
?>
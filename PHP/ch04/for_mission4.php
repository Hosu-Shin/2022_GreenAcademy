<?php
    /*
    문제 6.
        지금까지 배운 것을 모두 활용하여

        출력 : [1, 2, 3, 4, 5, 6, 7]

    */

    $end_val = 10;

    echo "[";
    for ($num = 1 ; $num < $end_val ; $num++)
    {
        echo $num;
        
        if($num < $end_val-1)
        {
            echo ", ";
        }
    }
echo "]";


echo "<br>";

echo "[";
    for ($num = 1 ; $num < $end_val ; $num++)
    {
        if($num > 1)
        {
        echo ", ";
        }

        echo $num;
    }
echo "]";

// 어떤 역할을 하는 숫자들을 "magic number"라고 부르며 $end_val가 magic number에 해당한다

?>
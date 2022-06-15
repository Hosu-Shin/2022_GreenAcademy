<?php

        function swap_val($n1, $n2){
            $temp = $n1;
            $n1 = $n2;
            $n2 = $temp;
        }

        $a = 10;
        $b = 30;

        echo "a : $a, b : $b <br>";
        swap_val($a, $b); // call by value
        echo "a : $a, b : $b <br>"; //결과값에 변화가 없음
        print "----------<br>";

        //

        function swap_ref(&$n1, &$n2){
            $temp = $n1;
            $n1 = $n2;
            $n2 = $temp;
        }

        echo "a : $a, b : $b <br>";
        swap_ref($a, $b); //call by reference
        echo "a : $a, b : $b <br>"; //결과값에 변화가 없음
        print "----------<br>";

?>
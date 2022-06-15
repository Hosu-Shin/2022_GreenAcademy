<?php
    /*
    문제)   [5] => 60까지 나오도록 만드시오
    */

        $arr = [10, 20, 30, 40, 50];
        plus_array($arr, 10);
        print_r($arr);

    function plus_array(&$arr, $val){
            foreach($arr as $k => $v){
                $arr[$k] = $v + $val;
            }

    }
    

?>
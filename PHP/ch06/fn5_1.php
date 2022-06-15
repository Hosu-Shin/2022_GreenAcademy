<?php
/*
문제) 
    [5, 6, 7, 8, 9] 이렇게 출력하게 해주세요
    만약 enum값이 더 작으면 [5, 4, 3, 2, 1] 이렇게 출력
    
*/

    $snum = 5;
    $enum = 10;
    print_num_from_to($snum, $enum);

   
    function print_num_from_to ($n1, $n2){   
        echo "[";
            if($n1 < $n2) {
                for($i = $n1 ; $i <= $n2 ; $i++){
                    echo $i;
                    if($i < $n2){
                        print ", ";
                    }
                }
            }
        else{
           for($z = $n1 ; $z >= $n2 ; $z--){
               echo $z;
               if($z > $n2){
                   print ", ";
               }
           }
        }
        echo "]";
    }
    

    //강사님 답

    function print_num_from_to2($snum, $enum)
    {
        print "[";
        for($i = $snum; $snum < $enum ? $i<=$enum : $i>=$enum; $snum < $enum ? $i++ : $i--){
            if($i != $snum) { print ", ";}
            print $i;
        }
        print "]";
    }

?>

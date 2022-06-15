<?php
    
    /*
    function print_sum(...$vals){    //가변인자 : ...
        $sum = 0;
        for ($i = 0 ; $i < count($vals) ; $i++){
            $sum += $i;
            $sum++;
        }
        print "sum : " . $sum . "<br>";
        return $i;
    }
    이 문장은 count수를 더해주는 거라서 숫자 바꿔도 소용없음
    */

    //은지씨 꺼 보고 수정힘
    function print_sum(...$vals){    //가변인자 : ...
        $sum = 0;
        for ($i = 0 ; $i < count($vals) ; $i++){
            $sum += $vals[$i];
        }
        print "sum : " . $sum . "<br>";
        return $i;
    }



    print_sum(1, 2);  // sum : 3
    print_sum(1, 2, 3); // sum : 6
    print_sum(1, 2, 3, 4); // sum : 10

    
    //강사님 답
    // function print_sum(...$vals){
    //     /*
    //     $sum = 0;
    //     $val = $vals[$i];
    //     $sum += $val;
    //     /*
    //     foreach($vals as $val)
    //     {$sum +=$val;}
    //     */
    //     print "sum : $sum <br>";
    //     */
    //
    //      print "sum : " . array_sum($vals) . "<br>";
    // }
    
?>
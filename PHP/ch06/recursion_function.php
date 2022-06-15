<?php
    //재귀함수
    /*
    내가 함수라면, 내가 나를 호출하는 것
    */

    //$result = factorial(5); // 팩토리얼은 5 x 4 x 3 x 2 x 1 이 되는 것이다

    

        $num = 3;
        $result = factorial($num);
        print "${num}! = $result <br>";


    // 첫번째 구글 보면서 혼자 푼 거
    /*
        function factorial($num) {
            $result = 1;
            for($i = 2; $i <= $num ; $i++)
            $result *= $i;
            return $result;
        }
    */

    // 다른 사람 정답
    /*
        function factorial($num) {
            $result = 1;
            for($i = $num ; $i > 0 ; $i--)
                $result *= $i;
            return $result;
        }
    */

    function factorial ($num){
        $result = 1;
        for($i = 1; $i <= $num; $i++){
            $result *= $i;
        }
        return $result;
    }

    echo factorial(3) , "<br>------------------------</br>";



        $num = 6;
        $result = factorial_rec($num);
        print "${num}! = $result <br>";

    function factorial_rec($num){
        if($num === 1) { return 1;} // 만약 $num이 1이면 1값을 return하겠다 (뒤의 함수는 실행하지 않고 끝남)
        return $num * factorial_rec($num -1);
    }

    echo factorial_rec(6) , "<br>-----------------------</br>";

    //풀이)
    /*
        function factorical_rec(6){
            if(6 === 1) {return 1;}
            return 6 * factorical_rec(6-1);
        }
        결과값 : 6 x (5 x 4 x 3 x 2 x 1)
     */   


?>
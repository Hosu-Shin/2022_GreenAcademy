<?php
    $week = array("일", "월", "화", "수", "목", "금", "토" ); //변수는 무조건 값 하나만 저장 가능
    /*
    원래라면
    week 1 = 월
    week 2 = 화
    week 3 = 수
    week 4 = 목
    week 5 = 금
    이렇게 한 개씩 지정해야 한다
    */
    echo $week, "<br>";
    print_r($week);
    //여러 값을 한 곳에 몰아서 쓰기 위해 배열(array사용)
    //배열에는 index가 존재한다

    echo $week[0] , "<br>"; // 0번을 출력한다
    echo $week[3] , "<br>"; // 3번을 출력한다

    $week[3] = "Wed"; // 3번의 값을 Wed로 바꾼다
    echo $week[3] , "<br>"; // 바뀐 3번을 출력한다

    $week[7] = "응?"; // 7번이 새롭게 생겼다
    echo $week[7] , "<br>";

    $week[9] = "므";
    echo $week[8] , "<br>"; // (할당된) 값이 없으면 빈칸으로 표현한다
    echo $week[9] , "<br>";
    echo $week[11] , "<br>";
    echo "test <br>"; //빈칸으로 출력됐는지 확인하려고 적어 놓은 쿼리

    $test = array("A","B"); //$test는 지금 array에게 접근할 수 있는 주소값이다
    echo count($test) , "<br>"; // test가 array에 접근해서 array가 몇개의 값을 담고 있는지 카운트 한 후 그 갯수를 출력

    //$test[10] = "C";
    array_push($test, "C", "D"); // array_push(내가 접근하고자 하는 배열의 주소값, 내가 넣고 싶은 값 , 내가 넣고 싶은 값2) 순차적으로 나열됨
                                // array에 값을 추가 싶을 때는 array_push를 사용해야 error가 안 남
    // 현재 $test는 $test = array(A,B,C,D) 상태가 됨

    echo "count(\$test) : " , count($test) , "<br>"; 
    // "\"는 기능을 무효화 시키는 것이라고 보면 된다, 그래서 test의 $가 무효화 처리 되서 test 문자 그대로 출력된 것
    echo "test[2] : " , count($test) , "<br>";

    echo "-----------------------------<br>";
    
    $test2 = array(1, 3.44, "안녕");
    echo $test2[0] , "<br>";
    echo $test2[1] , "<br>";
    echo $test2[2] , "<br>";

    //배열에 서로 다른 속성의 값을 넣을 수 있지만 하지 맙시다 (╯°□°)╯︵ ┻━┻

    echo "----------------------------<br>";

    $weekend = array($week[6], $week[0]); 
    
   

    echo $weekend[0], "," , $weekend[1];

?>
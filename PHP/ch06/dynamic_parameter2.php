<?php
  //가변함수  
/*
       함수를 만들었는데 함수 값이 여러개 있을 경우가 있다
       function a($n1, $n2)일 경우 인자값을 2개 이상 사용할 수 있고 적으면 에러 뜸
       
       [ ex)function a($n1 , $n2){
              print "동작!"
            }
            a (2, 3, 4, 5) // 앞의 2개 값 밖에 받지 못하고 뒤의 값은 무시됨
        ]
        그레서 이러한 경우를 피하기 위해 dynamic_parameter (...)를 활용하는 것이다
        
*/

    /*
        func_num_args() : 인자수 리턴
        func_get_arg() : 인자값 가져올 때 사용
        func_get_args() : 인자를 배열로 받음
    */
    
 
    // function print_sum1()
    // {
    //     echo "n1 : $n1";
    //     echo "n2 : $n2";
    // }

    function print_sum()
    {
        echo func_get_args() . "<br>";
        echo func_num_args() . "<br>";
        echo func_get_arg(0) . "<br>";

    }

    print_sum(1, 2);  // sum : 3
    print_sum(5, 2, 3); // sum : 6
    print_sum(8, 2, 3, 4); // sum : 10

    print "<br>----------------------------</br>";

    function multi(){
        print "[0] : " . func_get_args()[0] . "<br>";
    }

    multi(2);
    multi(5, 10);
    
?>
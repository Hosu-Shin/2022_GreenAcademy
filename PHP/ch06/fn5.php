<?php
/*
문제) 
    [4, 5, 6, 7, 8, 9, 10] 이렇게 출력하게 해주세요
    만약 enum값이 더 작으면 "종료갑이 더 작을 수 없습니다" 출력
    
*/

    $snum = 4;
    $enum = 10;
    print_num_from_to($snum, $enum);

   
    function print_num_from_to ($n1, $n2)
    {   echo "[";
        for($i = $n1 ; $i <= $n2 ; $i++){
            echo $i;
            if($i < $n2){
                print ", ";
            }
        }
        echo "]";
        if($n1 > $n2){
            print "종료값이 더 작을 수 없습니다";
        }
        echo "]";
    return $i;
    }


    //원영씨 답

    // function print_num_from_to($snum, $enum)
    // {
    //     if($snum < $enum) {
    //         print "[";
    //         for($i=$snum ; $i<=$enum ; $i++){
    //             if($i > $snum){
    //                 print ",";
    //             }
    //             print $i;
    //         }
    //         print "]";
    //     } else {
    //         print "종료값이 더 작을 수 없습니다.";
    //     }
    // }

    //강사님 답

    // function print_num_from_to($snum, $enum){
    //     if($enum < $snum){
    //         print "<div>종료값이 더 작을 수 없습니다.</div>";
    //         return; //True값일 때 return을 만나서 끝났으므로 아래 쪽 함수는 실행이 안됨 (else 쓸 필요 없이 return으로 해결함)
    //     }

    //     print "[";
    //     for($i=$snum ; $i <= $enum ; $i++){
    //         if($i > $snum){
    //             print ", ";
    //         }
    //         print $i;
    //     }
    //     print "]";
        
    // }
?>

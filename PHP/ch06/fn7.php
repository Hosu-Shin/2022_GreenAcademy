<?php

    // 3~5 : 봄
    // 6~8 : 여름
    // 9~11 : 가을
    // 12, 1, 2 : 겨울
    // 나머지 값은 : 빈칸

    $mon = rand(0, 15);

    $season = get_season($mon);
    $season = get_season2($mon);

    
    if($season){
        print "${mon}월은 ${season}입니다";
    } else { print "${mon}월은 잘못된 값";
    }


function get_season($mon) {
    $season = "";
    switch($mon)
        {
            case 3: case 4: case 5:
                $season = "봄";
                break;
            
            case 6: case 7: case 8:
                $season = "여름";
                break;

            case 9: case 10: case 11:
                $season = "가을";
                break;

            case 12: case 1: case 2:
                $season = "겨울";
                break;
            
        }
    return $season;
}


// 강사님 답


    // if($season){
    //     print "${mon}월은 ${season}입니다.";
    // } else {
    //     print "${mon}월은 잘못된 값";
    // }

    // function get_season($mon){
    //     if($mon < 1 || $mon > 12) {  //1은 1보다 작지않다, 1은 12보다 크지 않다 => false (flase면 다음 if문드로 넘어감)
    //         return "";
    //     }
    //     else if ($mon < 3 || $mon ===12) {
    //         return "겨울";
    //     }
    //     else if ($mon < 6 ) {
    //         return "봄";
    //     }
    //     else if ($mon < 9 ) {
    //         return "여름";
    //     }
    //     else {
    //         return "가을";
    //     }
    // } 
    //elseif로 사용하면 되긴하지만, return을 사용했기 때문에 굳이 elseif쓸 필요 없음
    //if문은 그룹으로 묶어주지 않으면 다 실행되기 때문에 elseif나 return으로 끊어줘야함
    //return 과 break : break는 switch문을 리턴되는 값 없이 스위치 문을 아예 끝내는 거다
    // return은 해당 함수의 값을 가진 채로 멈추고 다음 함수 진행한다 생각하면 됨


// 강사님 답

    function get_season2($mon){
        switch($mon){
            case 1:
            case 2:
            case 12:
                return "겨울";
            case 3:
            case 4:
            case 5:
                return "봄";
            case 6:
            case 7:
            case 8:
                return "여름";
            case 9:
            case 10:
            case 11:
                return "가을";
            default:
                return "";
        }
    }

?>
<?php
    include_once "db/db.php";

    //DB와 연결하여 connection객체 얻어오기
    $conn = get_conn();

    //오늘 날짜 정보 가져오기
    $YY = date('Y');
    $MM = date('m');
    $DD = date('d');

    //2022-05-04
    $dat = $YY."-".$MM."-".$DD;
    
    //오늘 날짜로 정보를 DB에서 조회한다
    $sql = " SELECT * FROM visit_db
            WHERE redate = '$dat'
            ";
    
    //쿼리 전송
    $result = mysqli_query($conn, $sql);
    
    //결과 집합을 받아오기
    $list = mysqli_num_rows($result);

    if(!$list) { //아무도 들어온 적이 없어서 date정보가 없을 경우
        $count = 0; //count = 0
    } else { //누군가 들어온 적이 있어서 date정보가 존재할 경우
        $row = mysqli_fetch_array($result);
        $count = $row['count']; //현재 날짜의 count값을 가져온다
    }

    //DB에 정보가 있나 없냐를 확인함

    if($count === 0) {
        $count++;
        //오늘 날짜로 새로운 count값을 추가한다
        $sql = "INSERT INTO visit_db
                VALUES ($count, '$dat')
                ";
    } else {
        $count++;
        //오늘 날짜의 기존 count값을 변경시킨다
        $sql = "UPDATE visit_db
                SET count = $count
                WHERE redate = '$dat'
                ";
    }

    mysqli_query($conn, $sql);

    //Total 조회수 : 모든 count값을 sum() 적용
    $totalQurey = "SELECT SUM(count) FROM visit_db";
    $totalCount = mysqli_fetch_array(mysqli_query($conn, $totalQurey))[0];
    mysqli_close(($conn));
    
    // $totalQurey = "SELECT SUM(count) FROM visit_db";
    // $totalCount = mysqli_fetch_assoc(mysqli_query($conn, $totalQurey))['count'];
    // mysqli_close(($conn));




    

    echo "<br><center><h2> 방문자 수 통계입니다 </h2><hr>";
    echo "[ Today : <font color = red>";
    echo $count."명";
    echo "</front>] <br>";

    echo "[ Total : <font color = blue>";
    echo $totalCount."명";
    echo "</front>] <br>";

?>

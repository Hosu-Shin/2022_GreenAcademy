<?php
    include_once 'db.php';
    

    $i_board = $_GET['i_board'];
    // _GET['i_board']는 ?(쿼리스트링)으로 보내는 i_board의 값을 받겠다는 말이다
    // GET방식에서 쓸 수 있는 것은 뭐리스트링 밖에 없다 html에서 사용 할 수 없다 (POST는 쿼리, html 다 사용 가능) 
    $sql = " SELECT * FROM t_board WHERE i_board = $i_board ";
    
    $conn = get_conn(); //값 가져오기
    $result = mysqli_query($conn, $sql); //결과값 실행 (result에는 결과값이 저장된다)
    mysqli_close($conn); // 값 실행 닫기
    
    if($row = mysqli_fetch_assoc($result)) ////where절에 pk가 들어갔을 때 나올 수있는 레코드 경우의 수 = 2개 (0 1)
    {
        $title = $row['title']; //$title(value값) = $row['title(key값'];
        $ctnt = $row['ctnt'];
        $create_at = $row['create_at'];
        $mod_at = $row['mod_at'];
    }
    
    // ?key값 = value값 |& key = val & key = val 방식으로 사용함

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title> <!--php축약형-->
</head>
<body>
    <a href="list.php"><button>리스트</button></a>
    <a href="del_proc.php?i_board=<?= $i_board ?>"><button>삭제</button></a>
    <!--
        <a href="del_proc.php"><button>삭제</button></a>
        이렇게 적으면 특정 레코드를 지우기 보다는 전체적으로 레코드가 삭제 될 수 있다
        그래서 디테일하게 잡아 줘야함
    -->
    <!--주소값(URL)을 적을때는 빈칸을 넣으면 에러뜬다, 빈칸있는지 확인 잘 하기-->
    <a href="mod.php?i_board=<?= $i_board ?>"><button>수정</button></a>
    
    <div>제목 : <?= $title ?></div>
    <div>작성일시 : <?= $create_at ?></div>
    <div>내용 : <?= $ctnt ?></div>
    <div>NOW : <?= $mod_at ?><div>
</body>
</html>
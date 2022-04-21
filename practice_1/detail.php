<?php

    include_once "connect.php";

    $i_board = $_GET['i_board'];
    $sql = "SELECT * FROM i_board WHERE i_board = $i_board;";

    $conn = DB(); 
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if($row = mysqli_fetch_assoc($result)){
         $title = $row['title'];
         $ctnt = $row['ctnt'];
         $create_at = $row['create_at'];
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정보</title>
</head>
<body>
    <h1>글 정보</h1>
    <a href = "list.php"><button>목록</button></a>
    
    <a href = "del.php?i_board=<?= $i_board ?>"><button>삭제</button></a>
    <!--?i_board=를 하지 않으면 어떤 항목을 지울지 알 수 없기 때문에 삭제가 안 먹힌다 -->
    
    <a href = "mod.php?i_board=<?= $i_board ?>"><button>수정</button></a>
    
    <p><label>제목 : </label><?= $title ?></p>
    <p><label>내용 : </label><?= $ctnt ?></p>

</body>
</html>
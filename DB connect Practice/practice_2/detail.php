<?php

    include_once "data.php";

    $num_board = $_GET['num_board'];
    $conn = DB();
    
    $sql = "SELECT * FROM a_board WHERE num_board = $num_board;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if($arr = mysqli_fetch_assoc($result)){
        $title = $arr['title'];
        $ctnt = $arr['ctnt'];
        $creat = $arr['create_at'];
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 정보</title>
</head>
<body>
    <h1>글 정보</h1>
        <a href = 'list.php'><button>목록</button></a>
        <a href = 'mod.php?num_board=<?= $num_board ?>'><button>수정</button></a>
        <a href = 'del.php?num_board=<?= $num_board ?>'><button>삭제</button></a>
    <p></p>
    <div> 제목 : <?= $title ?></div>
    <div> 내용 : <?= $ctnt ?></div>
</body>
</html>
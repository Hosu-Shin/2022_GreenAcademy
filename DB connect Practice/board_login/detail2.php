<?php

    session_start();
    include_once "db/db_board.php";

    $i_board = $_GET['i_board'];

    $param = [
        "i_board" => $i_board,
        "title" => $title,
        "ctnt" => $ctnt,
        "writer" => $writer,
        "created_at" => $create
    ];

    $result = sel_board2($param);


    if($row = mysqli_fetch_assoc($result))
    {
        $i_board = $row['i_board'];
        $title = $row['title'];
        $writer = $row['writer'];
        $ctnt = $row['ctnt'];
        $create = $row['created_at'];

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>제목</title>
</head>
<body>
    <div><a href = "list.php">리스트</a></div>
    <div>
        <a href = "mod.php"><button>수정</button></a>
        <a href = "del.php"><button>삭제</button></a>
    </div>
    <div>제목 : <?= $title ?></div>
    <div>글쓴이 : <?= $writer ?></div>
    <div>등록일시 : <?= $create ?></div>
    <div> <?= $ctnt ?> </div>
    
</body>
</html>
<?php

    include_once "connect.php";

    $num = $_GET['num'];

    $conn = data();
    $sql = " SELECT * FROM c_board
            WHERE num = $num;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if($row = mysqli_fetch_assoc($result)){
        $title = $row['title'];
        $ctnt = $row['comment'];
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
    <a href = 'list.php'><button>뒤로</button></a>
    <div></div>
    <div>제목 : <?= $title ?></div>
    <div>내용 : <?= $ctnt ?></div>
    <div></div>
    <a href = 'mod.php?num=<?= $num ?>'><button>수정</button></a>
    <a href = 'del.php?num=<?= $num ?>'><button>삭제</button></a>
</body>
</html>
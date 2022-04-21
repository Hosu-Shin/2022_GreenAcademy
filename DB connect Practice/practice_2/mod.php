<?php

    include_once "data.php";

    $num_board = $_GET['num_board'];

    $conn = DB();
    
    $sql = "SELECT * FROM a_board
            WHERE num_board = $num_board;";
    
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
    <title>글 수정</title>
</head>
<body>
    <h1>글 수정</h1>
    <a href='list.php'><button>목록</button></a>
    <a href='detail.php?num_board=<?= $num_board ?>'><button>뒤로가기</button></a>
    <a href='del.php?num_board=<?= $num_board ?>'><button>삭제</button></a>

    <form action = 'mod_proc.php' method = "post">
        <div><input type = "hidden" name = "num_board" value = "<?= $num_board ?>"></div>
        <div><input type = "text" name = "title" placeholder="수정할 제목을 입력하시오" value = "<?= $title ?>"></div>
        <div><textarea name = "comment" placeholder="수정할 내용을 입력하시오" value = "<?= $ctnt ?>"></textarea></div>

        <input type = "submit" name = "submit" value="수정">
        <input type = "reset" name = "reset" >
</body>
</html>

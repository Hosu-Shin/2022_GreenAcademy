<?php

    include_once "connect.php";

    $num = $_GET['num'];

    $conn = data();
    $sql = " SELECT * FROM c_board
            WHERE num=$num";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);



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
    <a href = 'detail.php?num=<?= $num ?>'><button>뒤로</button></a>
    <a href = 'list.php'><button>목록</button></a>
    <a href = 'del.php?num=<?= $num ?>'><button>삭제</button></a>
    <div></div>
    <form action = 'mod_proc.php' method = 'post'>
        <div><input type = "hidden" name = "num" value = "<?= $num ?>"></div>
        <div><input type = "text" name = "title" placeholder="수정 제목"></div>
        <div><textarea name = "comment" placeholder="수정 내용"></textarea></div>
        <div></div>
        <input type = "submit" value="수정">
        <input type = "reset">
    </form>
</body>
</html>


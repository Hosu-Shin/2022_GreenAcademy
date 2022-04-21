<?php

 include_once "connect.php";

 $i_board = $_GET['i_board'];
 $sql = " SELECT * FROM i_board WHERE i_board = $i_board; ";

 $conn = DB();
 $result = mysqli_query($conn, $sql);
 mysqli_close($conn);

 if($row = mysqli_fetch_assoc($result)){
     $title = $row['title'];
     $cntn = $row['cntn'];
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
    <a href = "detail.php?i_board=<?= $i_board ?>"><button>뒤로가기</button></a>

    <form action = "mod_proc.php" method = "post">
        <p><input type = "hidden" name = "i_board" value = "<?= $i_board ?>"></p>
        <p><label>Title : </label><input type = "text" name = "title" placeholder="제목을 입력해 주세요." value = "<?= $title ?>"></p>
        <p><textarea name = "ctnt" placeholder="내용을 입력해 주세요" cols = "22" rows = "5" value = "<?= $ctnt ?>"></textarea></p>
        <div>
            <input type = "submit" name = "submit" value = "수정">
            <input type = "reset" name = "reset">
        </div>
    </form>

</body>
</html>

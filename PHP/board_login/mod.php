<?php
    include_once "db/db_board.php";   

    session_start();
    $login_user = $_SESSION['login_user'];
    $i_user = $login_user['login_user'];
    //session 처리를 하지 않을 경우 주소창에서 수정화면으로 들어가면 수정 창이 뜸
    
    $i_board = $_GET["i_board"];
    $param = [
        "i_board" => $i_board
    ];

    $result = sel_board($param);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "css/common.css" />
    <title>글 수정</title>
</head>
<body>
    <h1>글 수정</h1>
    <form action = "mod_proc.php" method = "post" >
        <div><input type="hidden" name="i_board" value="<?= $i_board ?>"></div> <!--key값이 무조건 필요하다-->
        <div><input type = "text" name = "title"  value="<?= $result['title'] ?>"></div>
        <div><textarea name = "ctnt" placeholder="내용"><?= $result['ctnt'] ?></textarea></div>
        <div></div>
        <input type = "submit" value="수정">
        <input type = "reset" value="취소">
    </form>
</body>
</html>
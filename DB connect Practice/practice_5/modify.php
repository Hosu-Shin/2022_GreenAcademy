<?php

    include_once "db.php";

    $idx = $_GET['idx'];

    $conn = data();
    $sql = " SELECT * FROM e_board
            WHERE idx=$idx;";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css" />
</head>
<body>
    <div id = "board_write">
        <h1><a href = "list.php">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id = "write_area">
                <form action = "mod_proc.php?idx=<?= $idx ?>" method = "post">
                    <!-- <div>
                        <input type = "hidden" name = "idx" value = "<?= $idx ?>">
                    </div> -->
                    <div id = "in_title">
                        <textarea name = "title" id = "utitle" rows = "1" cols = "55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class = "wi_line"></div>
                    <div id = "in_name">
                        <textarea name = "name" id = "uname" rows = "1" cols = "55" placeholder="글쓴이" maxlength="100" required></textarea>
                    </div>
                    <div id = "in_content">
                        <textarea name = "content" id = "ucontent" placeholder="내용" maxlength="100" required></textarea>
                    </div>
                    <idv id = "in_pw">
                        <input type = "password" name = "upw" id = "upw" placeholder="비밀번호" required />
                    </idv>
                    <div class = "bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>
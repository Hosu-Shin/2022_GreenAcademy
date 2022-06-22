<!DOCTYPE html>
<html lang="en">
<?php include_once "application/views/template/head.php"; ?>

<body>
<h1>글쓰기</h1>
    <form action = "writeProc" method = "post">
        <div><input type = "text" name = "title" placeholder="제목"></div>
        <div><textarea name = "ctnt" placeholder="내용"></textarea></div>
        <div>
            <input type = "submit" value = "글쓰기">
            <input type = "reset" value = "초기화">
        </div>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기</title>
</head>
<body>
    <h1>글쓰기</h1>
    <a href = "list.php"><button>목록</button></a>
    <form action = "write_proc.php" method = "post">
        <p><label> Title </label><input type = "text" name = "title" placeholder = "제목을 입력해 주세요."></label></p>
        <p><textarea name = "ctnt" placeholder = "내용을 입력해 주세요." cols = "22" rows = "5"></textarea></p>
        <div>
            <input type = "submit" name = "submit" value = "글등록">
            <input type = "reset" naem = "reset" value = "초기화">
        </div>
    </form>
</body>
</html>
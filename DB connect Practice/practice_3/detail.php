<?php

    include_once "data.php";

    $num = $_GET['num'];
    $conn = data();
    $sql = "SELECT * FROM b_board
            WHERE num=$num;";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if($arr = mysqli_fetch_assoc($result)){
        $title = $arr['title'];
        $ctnt = $arr['content'];
    }
    //if를 넣는 이유는, $result 값이 잘 들어 왔는지 확인하기 위해서 사용하는 것이다.
    //if문 없으면 값 확인 못함
    //한줄만 보려면 if, 여러줄 보려면 while (그래서 list확일 할 때는 while문 사용함)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 내용</title>
</head>
<body>
    <h1>글 내용</h1>
    <a href = 'list.php'><button>목록</button></a>
    <a href = 'mod.php?num=<?= $num ?>'><button>수정</button></a>
    <a href = 'del.php?num=<?= $num ?>'><button>삭제</button></a>

    <p></p>
    <div>제목 : <?= $title ?></div>
    <div>내용 : <?= $ctnt ?></div>
</body>
</html>
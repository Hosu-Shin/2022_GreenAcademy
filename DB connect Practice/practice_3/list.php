<?php

    include_once "data.php";

    $num = $_GET['num'];

    $conn = data();
    $sql = " SELECT * FROM b_board
            ORDER BY num DESC;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 목록</title>
</head>
<body>
    <h1>글 목록</h1>
    <a href = "write.html"><button>글 작성</button></a>
    <div></div>
    <table>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>내용</th>
            <th>생성일자</th>
        </tr>
        <tr>
            <?php
                while($arr = mysqli_fetch_assoc($result)){
                    $num = $arr['num'];
                    $title = $arr['title'];
                    $ctnt = $arr['content'];
                    $date = $arr['create_at'];
                    
                    print "<tr>";
                    print "<td>$num</td>";
                    print "<td><a href = 'detail.php?num=$num'>$title</a></td>";
                    print "<td>$ctnt</td>";
                    print "<td>$date</td>";
                    print "</tr>";
                }
            ?>
        </tr>
    </table>
</body>
</html>
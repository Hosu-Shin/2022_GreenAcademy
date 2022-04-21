<?php

    include_once "data.php";

    $conn = DB();
    
    $sql = "SELECT * FROM a_board ORDER BY num_board DESC;";

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
    <table>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>내용</th>
            <th>생성일자</th>
        </tr>
        <?php
            while($arr = mysqli_fetch_assoc($result)){
                $num_board = $arr['num_board'];
                $title = $arr['title'];
                $ctnt = $arr['ctnt'];
                $creat = $arr['create_at'];

                print "<tr>";
                print "<td>${num_board}</td>";
                print "<td><a href = 'detail.php?num_board=${num_board}'>${title}</td>";
                print "<td><a href = 'mod.php?num_board=${num_board}'>${ctnt}</td>";
                print "<td>${creat}</td>";
                print "</tr>";

            }

        ?>
        <tr>
            <a href = "write.html"><button>새 글</button></a>
        </tr>
    </table>
</body>
</html>
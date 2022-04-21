<?php

    include_once "connect.php";

    $num = $_GET['num'];
    $conn = data();
    $sql = " SELECT * FROM c_board
            ORDER BY num DESC; ";

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
    <link rel="stylesheet" type="text/css" href="./index.css">
</head>
<body>
    <h1>글 목록</h1>
    <a href = 'write.html'><button>작성</button></a>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="cols">번호</th>
                    <th scope="cols">제목</th>
                    <th scope="cols">내용</th>
                    <th scope="cols">생성일자</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                            $num = $row['num'];
                            $title = $row['title'];
                            $ctnt = $row['comment'];
                            $date = $row['date'];

                            print "<tr>"; //print를 안 해서 값이 안 보였던 거다(╯°□°）╯︵ ┻━┻
                            print "<th scope='row'> $num </th>";
                            print "<td><a href = 'detail.php?num=$num'> $title </a></td>";
                            print "<td> $ctnt </td>";
                            print "<td> $date </td>";
                            print "</tr>";
                        }
                    ?>
                </tr>
            </tbody>
        </table>
</body>
</html>

<?php

    include_once "connect.php";

    $conn = DB();
    $sql = "SELECT * FROM i_board ORDER BY i_board DESC";
    //내가 select 할 내용을 선택해 줘야 값을 불러 올 수 있으니 그냥 * 이거 써서 전부다 불러 오도록 하자
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>리스트</title>
</head>
<body>
    <h1>리스트</h1>
    <a href = "write.php"><button>글쓰기</button></a>
        <table>
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>내용</th>
                <th>생성일시</th>
            </tr>
            
            <?php

                while($row = mysqli_fetch_assoc($result)){
                    $i_board = $row['i_board'];
                    $title = $row['title'];
                    $ctnt = $row['ctnt'];
                    $create_at = $row['create_at'];

                    print "<tr>";
                    print "<td>${i_board}</td>";
                    print "<td><a href='detail.php?i_board=${i_board}'> ${title} </a></td>";
                    print "<td>${ctnt}</td>";
                    print "<td>" . $create_at . "</td>";
                    print "</tr>";
                }
            
            ?>

        </table>
</body>
</html>
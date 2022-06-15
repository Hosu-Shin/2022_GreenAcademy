<?php
    include_once "db.php";
    $conn = get_conn();
    $sql = "SELECT i_board, title, create_at FROM t_board ORDER BY i_board DESC";
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
    <a href="write.php"><button>글쓰기</button></a>
    <table>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>작성일시</th>
        </tr>
        <?php 
            while($row = mysqli_fetch_assoc($result)) 
            //제일 첫번째 배열을 정리해서 result에게 넘겨준다 → 그 다음 두번째 줄, 세번째 줄 진행,
            //while문은 변수에 값이 0이거나 없으면 flase이므로 중단됨
            {
                $i_board = $row['i_board']; // []안에는 컬럼명을 적는다
                $title = $row['title'];
                $create_at = $row['create_at'];
                print "<tr>";
                print "<td>${i_board}</td>";
                print "<td><a href='detail.php?i_board=${i_board}'>${title}</a></td>";
                    //  웹에서 a태그 부분에 마우스를 올리면 웹창 왼쪽 하단에 해당 a태그의 주소값이 뜬다
                print "<td>${create_at}</td>";
                print"</tr>";
            }
        ?>
    </table>
</body>
</html>
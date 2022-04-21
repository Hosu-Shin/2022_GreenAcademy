
<?php

    include_once "db.php";

    $idx = $_GET['idx'];

    $conn = data();
    $sql = " SELECT * FROM e_board
            ORDER BY idx DESC;";

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
    <link rel="stylesheet" type="text/css" href="css/style2.css" />
</head>
<body>
    <div id="board_area">
        <h1><a href = "list.php">자유게시판</a></h1>
         <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
         <table class = "list-table">
            <thead>
                <tr>
                    <th width="70">번호</th>
                    <th width="700">제목</th>
                    <th width="120">글쓴이</th>
                    <th width="150">작성일</th>
                </tr>
            </thead>
            <?php

                while($row = mysqli_fetch_assoc($result)){
                    $idx = $row['idx'];
                    $name = $row['name'];
                    $title = $row['title'];
                    $ctnt = $row['content'];
                    $date = $row['date'];

                    // print "<tr>";
                    // print "<th scope='row'> $idx </th>";
                    // print "<td><a href = 'detail.php?num=$idx'> $title </a></td>";
                    // print "<td> $name </td>";
                    // print "<td> $date </td>";
                    // print "<td> $hit </td>";
                    // print "</tr>";
                    
            ?>
            <tbody>
                <tr>
                    <td width="70"><?= $idx ?></td>
                    <td width="500"><a href = "read.php?idx=<?= $idx ?>"><?= $title ?></a></td>
                    <td width="120"><?= $name ?></td>
                    <td width="100"><?= $date ?></td>
                </tr>
            </tbody>
            <?php } ?>
          </table>
          <div id = "write_btn">
              <a href = "./write.html"><button>글쓰기</button></a>
          </div>
    </div>
</body>
</html>
<?php

    include_once "db.php";

    $idx = $_GET['idx'];
    $name = $_POST['name'];
    $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $ctnt = $_POST['content'];

    $conn = data();
    $sql = " UPDATE e_board SET
            name = '${name}',
            pw = '${pw}',
            title = '${title}',
            content = '${ctnt}'
            WHERE idx = $idx;
            ";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    // header("Location: ./list.php");

?>

<script type="text/javascript">alert("수정되었습니다."); </script>
<meta http-equiv="refresh" content="0 url=./read.php?idx=<?= print $idx; ?>">
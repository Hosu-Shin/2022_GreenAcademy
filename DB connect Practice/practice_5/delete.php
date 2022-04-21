<?php

    include_once "db.php";

    $idx = $_GET['idx'];
    
    $conn = data();
    $sql = " DELETE FROM e_board
            WHERE idx = $idx;
            ";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

?>

<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=./list.php" />
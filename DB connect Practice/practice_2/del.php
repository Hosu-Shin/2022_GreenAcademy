<?php

    include_once "data.php";

    $num_board = $_GET['num_board']; //get 하지 않으면 데이터 연동이 안 되서 삭제가 안됨

    $conn = DB();
    $sql = "DELETE FROM a_board
            WHERE num_board = '${num_board}';";

    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('Location: ./list.php');
?>
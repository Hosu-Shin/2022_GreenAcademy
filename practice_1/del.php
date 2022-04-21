<?php

    include_once "connect.php";

    $i_board = $_GET['i_board'];
    $sql = "DELETE FROM i_board WHERE i_board = $i_board";

    $conn = DB();
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('Location: ./list.php');

?>
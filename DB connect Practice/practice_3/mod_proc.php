<?php

    include_once "data.php";

    $num = $_POST['num'];
    $title = $_POST['title'];
    $ctnt = $_POST['comment'];

    $conn = data();

    $sql = " UPDATE b_board SET
            title = '${title}',
            content = '${ctnt}'
            WHERE num = $num;
            ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("Location: detail.php?num=$num");

?>
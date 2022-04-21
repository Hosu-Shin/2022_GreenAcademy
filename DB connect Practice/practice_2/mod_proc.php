<?php

    include_once "data.php";

    
    $num_board = $_POST['num_board'];
    $title = $_POST['title'];
    $ctnt = $_POST['comment'];

    $conn = DB();
    $sql = " UPDATE a_board SET
            title = '${title}',
            ctnt = '${ctnt}'
            WHERE num_board = '${num_board}';
            ";

    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("Location: detail.php?num_board=$num_board");
   

?>


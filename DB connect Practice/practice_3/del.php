<?php

    include_once "data.php";

    $num = $_GET['num'];

    $conn = data();
    $sql = "DELETE FROM b_board
            WHERE num = $num;";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("Location: list.php");
?>
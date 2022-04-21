<?php

    include_once "connect.php";

    $num = $_GET['num'];

    $conn = data();
    $sql = " DELETE FROM c_board
            WHERE num = $num;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    header ('Location: ./list.php');

?>
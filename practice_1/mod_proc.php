<?php

include_once "connect.php";

$i_board = $_POST['i_board'];
$title = $_POST['title'];
$ctnt = $_POST['ctnt'];

$sql = " UPDATE i_board SET 
        title = '$title',
        ctnt = '$ctnt'
        WHERE i_board = $i_board;";

$conn = DB();
mysqli_query($conn, $sql);
mysqli_close($conn);

header("Location: detail.php?i_board=$i_board");

?>


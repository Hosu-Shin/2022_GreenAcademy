<?php

//수정 완료 후 detail.php로 이동

include_once 'db.php';

// $i_board = $_POST['i_board'];
// $conn = get_conn();
// $sql = "UPDATE t_board SET i_board = '' WHERE i_board = $_GET[i_board]";
// $ret = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM t_board WHERE i_board=$_GET[i_board]";
// $ret = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($ret);

$i_board = $_POST["i_board"];
$title = $_POST["title"];
$ctnt = $_POST["ctnt"];

$sql = 
    " 
    UPDATE t_board 
    SET title = '$title',
    ctnt = '$ctnt',
    mod_at = now()
    WHERE i_board = $i_board
    ";

    //WHERE 위에 , mod_at = now()

    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn); 

    header("Location: detail.php?i_board=$i_board");

?>
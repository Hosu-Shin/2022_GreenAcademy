<?php
    include_once 'db.php';

    $i_board = $_GET['i_board'];
    $sql = "DELETE FROM t_board WHERE i_board = $i_board";
    //$sql이 아니라 아무거나 적어도 된다

    $conn = get_conn(); 
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('Location: ./list.php');
    
?>

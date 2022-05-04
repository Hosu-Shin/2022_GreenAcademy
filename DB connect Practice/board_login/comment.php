<?php
    
    include_once "db/db_board.php";

    session_start();
    $login_user = $_SESSION["login_user"];

    $i_board = $_POST['i_board'];
    $i_user = $login_user["i_user"];
    $ctnt = $_POST['ctnt'];

    $param = [
        "i_board" => $i_board,
        "i_user" => $i_user,
        "ctnt" => $ctnt
    ];

    $result = ins_comment($param);

    if($result) { //0빼고는 다 True
        header("Location: detail.php?i_board=$i_board");
    }

?>

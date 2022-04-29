<?php
    include_once "db/db_board.php";

    session_start(); //i_user값 필요하기 때문에 session_start가 필요하다 (없을 경우 해당 유저가 아닌 경우에도 글 삭제가 가능해지기 때문)
    $login_user = $_SESSION['login_user'];

    $i_board = $_GET['i_board'];
    $i_user = $login_user['i_user'];

    $param = [
        "i_board" => $i_board,
        "i_user" => $i_user
    ];

    $result = del_board($param);

    if($result) {
        header("Location: list.php");
    }


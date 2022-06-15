<?php

    session_start();
    $login_user = $_SESSION["login_user"];

    include_once "db/db_board.php";
    
    $i_board = $_POST['i_board'];
    $title = $_POST['title'];
    $ctnt = $_POST['ctnt'];
    $i_user = $login_user["i_user"];

    $param = [
        "i_board" => $i_board,
        "i_user" => $i_user,
        "title" => $title,
        "ctnt" => $ctnt
    ];

    $result = upd_board($param);

    if($result) {
        header("Location: list.php");
    }

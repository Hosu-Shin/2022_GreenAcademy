<?php

    session_start();
    $login_user = $_SESSION["login_user"];

    $writer = $login_user["i_user"];

    // t_board에 insert 완료 후 list.php로 이동

    include_once "db/db_board.php";
 
    $title = $_POST['title'];
    $ctnt = $_POST['ctnt'];
    $file = $_FILES['file'];

    $param = [
        "writer" => $writer,
        "title" => $title,
        "ctnt" => $ctnt,
        "file" => $file
    ];

    $result = ins_board($param);

    $tmpFile =  $_FILES['file']['tmp_name'];
    $file = $_FILES['file']['name'];
    $fileName = iconv("UTF-8", "EUC-KR",$_FILES['file']['name']);
    $folder = "upload/".$fileName;
    move_uploaded_file($tmpFile,$folder);

    if($result) { //0빼고는 다 True
        header("Location: list.php");
    }

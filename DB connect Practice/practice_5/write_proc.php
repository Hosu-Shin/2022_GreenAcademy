<?php

    include_once "db.php";

    $conn = data();

    $name = $_POST['name'];
    $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $ctnt = $_POST['content'];
    $file = $_FILES['b_file'];
  

    $tmpfile =  $_FILES['b_file']['tmp_name'];
    $o_name = $_FILES['b_file']['name'];
    $filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
    $folder = "upload/".$filename;
    move_uploaded_file($tmpfile,$folder);


    $sql = " INSERT INTO e_board
            (name, pw, title, content, file)
            VALUES
            ('$name', '$pw', '$title', '$ctnt', '$folder');
            ";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("Location: ./list.php");
?>

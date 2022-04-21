<?php

    include_once "db.php";

    $conn = data();

    $name = $_POST['name'];
    $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $ctnt = $_POST['content'];
    // $file = $_FILES['b_file'];
    // $date = date('Y-m-d');

    // if(($name && $pw && $title && $ctnt) != "") {
        $sql = " INSERT INTO e_board
            (name, pw, title, content)
            VALUES
            ('$name', '$pw', '$title', '$ctnt');
            ";
    // } else {
    //     print "<script>alert('글쓰기에 실패했습니다.');
    //     history.back();</script>";
    // }

    // $tmpfile =  $_FILES['b_file']['tmp_name'];
    // $o_name = $_FILES['b_file']['name'];
    // $filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
    // $folder = "upload/".$filename;
    // $imageUpload = move_uploaded_file($tmpfile,$folder);

    // if($imageUpload == true){
    //     echo "파일이 정상적으로 업로드 되었습니다. <br>";
    //     echo "<img src='{$folder}' width='100' />";
    // }else{
    //     echo "파일 업로드에 실패하였습니다.";
    // }

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("Location: ./list.php");
?>



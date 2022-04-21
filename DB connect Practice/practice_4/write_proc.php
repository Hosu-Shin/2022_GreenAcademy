<?php

    include_once "connect.php";

    $title = $_POST['title'];
    $ctnt = $_POST['comment'];

    $conn = data();

    //내용 안 적으면 뜨는 팝업 (예외처리로 만듬)
    if(($title && $ctnt) != "" ) { //!==으로 사용하면 타입까지 생각하기 때문에 = 하나만 사용
        $sql = "INSERT INTO c_board (title, comment)
            VALUES ('$title', '$ctnt');";
    } else {
        print "<script>alert('내용을 적어주세요');</script>";
        //print "<script>location.href='wirte.html';</script>";
    }

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('Location: ./list.php');

    
?>

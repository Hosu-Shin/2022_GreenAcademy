<?php

    include_once "connect.php";

    $num = $_POST['num'];
    $title = $_POST['title'];
    $ctnt = $_POST['comment'];

    $conn = data();

    if($title && $ctnt != "") {
        $sql = " UPDATE c_board SET 
            title = '${title}',
            comment = '${ctnt}'
            WHERE num = $num;";
    } else { print "<script>alert('내용을 적어주세요');</script>";
        print "<script>location.href='mod.php?num=$num';</script>";
        }
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("Location: detail.php?num=$num");

?>

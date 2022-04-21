<?php

    include_once "data.php";

    $title = $_POST['title'];
    $ctnt = $_POST['comment'];

    $conn = DB();
    
    $sql = "INSERT INTO a_board
            (title, ctnt)
            VALUES
            ('${title}', '${ctnt}');
            ";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    print "title : $title <br>";
    print "ctnt : $ctnt <br>";
    print "result : $result <br>";

    header("Location: ./list.php");

?>

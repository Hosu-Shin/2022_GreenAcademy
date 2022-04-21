<?php

include_once "connect.php";

    $title = $_POST['title'];
    $ctnt = $_POST['ctnt'];

    print "title : $title <br>";
    print "ctnt : $ctnt <br>";

    $conn = DB();
    $sql = " INSERT INTO i_board
            (title, ctnt)
            VALUES
            ('${title}', '${ctnt}');";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    print "result : $result <br>";

?>
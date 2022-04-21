<?php
    include_once "data.php";

    $title = $_POST['title'];
    $ctnt = $_POST['comment'];

    $conn = data();

    $sql = " INSERT INTO b_board
            (title, content)
            VALUES
            ('$title', '$ctnt');
            ";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    
    print "title : ${title} <br>";
    print "comment : ${ctnt} <br>";
    print "result : ${result} <br>";

    header("Location: ./list.php");

?>
<?php
    include_once "db.php";
    //"db.php"안의 내용을 계속 복사 붙여넣기 할 거라면 안 써도 괜찮지만 나중에 수정할 때 힘듬
    //"db.php"를 참조하는 것이므로 

    $title = $_POST["title"];
    $ctnt = $_POST["ctnt"];

    print "title : $title <br>";
    print "ctnt : $ctnt <br>";
    
    $conn = get_conn();
    $sql = 
    "
        INSERT INTO t_board 
        (title, ctnt)
        VALUES
        ('${title}', '${ctnt}')
    "; //PHP는 Values안에 값을 여러개 넣었을 때 true라면 그 여러개의 값이 출력된다
   
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn); //연결 닫는거 !!!
    print "result : $result <br>";
   // header("Location: list.php");
   // 처리가 되면 보통 주소값이 이동된다
?>
<?php 

    include_once "db.php";

    // $idx = $_GET['idx'];

    // $conn = data();
    // $sql = " SELECT * FROM e_board
    //         WHERE idx = $idx;";
    
    // $result = mysqli_query($conn, $sql);
    // mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style3.css" /> 
</head>
<body>
    <?php
        $idx = $_GET['idx'];

        $conn = data();
        $sql = " SELECT * FROM e_board
                WHERE idx = $idx;";


        
        // $hit = $hit['hit'] + 1;
        // $fet = " UPDATE e_board SET
        //          hit = $hit WHERE idx = $idx;";
        
               
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        if($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $name = $row['name'];
            $date = $row['date'];
            $file = $row['file'];
            // $hit = $row['hit'];

        }

    ?>

    <div id = "board_read">
        <h2><?php echo $row['title'] ?></h2>
            <div id="user_info">
                <?php echo $row['name']; ?> <?php echo $row['date']; ?>
                    <div id = "bo_line"></div> 
            </div>
            <div>
            파일 : <img style=width:50% ; src = "<?=$file?>">
            </div>

            <div id = "bo_content">
                <?php echo nl2br($row['content']); ?>
            </div>

        <div id = "bo_ser">
            <ul>
                <li><a href="./list.php">[목록으로]</a></li>
                <li><a href="./modify.php?idx=<?= $idx ?>">[수정]</a></li>
                <li><a href="./delete.php?idx=<?= $idx ?>">[삭제]</a></li>
            </ul>
        </div>
    </div>
</body>
</html>

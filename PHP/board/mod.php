<!-- write.php와 detail.php를 합쳐놓은 것과 비슷함 -->

<?php
   
   include_once 'db.php';
    

   $i_board = $_GET['i_board'];
   $sql = " SELECT title, ctnt FROM t_board WHERE i_board = $i_board ";
   
   $conn = get_conn();
   $result = mysqli_query($conn, $sql);
   mysqli_close($conn);
   
   if($row = mysqli_fetch_assoc($result))
   {
       $title = $row['title'];
       $ctnt = $row['ctnt'];    
   }
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글수정</title>
</head>
<body>
    <h1>글수정</h1>
    <a href="detail.php?i_board=<?= $i_board ?>"><button>글로 이동</button></a>
    <form action="mod_proc.php" method="post">
        
        <input type="hidden" name="i_board" value="<?=$i_board?>"> <!--수정할 때 어떤 값을 수정할지 정하기 위해 input 타입을 하나 더 추가해 준다-->
        <!--input type="text"를 하면 추가된 칸 하나 보임-->
        <div><input type="text" name="title" placeholder="제목" value="<?=$title?>"></div>
        <div><textarea name="ctnt" placeholder="내용"><?=$ctnt?></textarea></div>
        <div>
            <input type="submit" value="글등록">
            <input type="reset" value="초기화">
        </div>
    </form>
</body>
</html>

<!--디테일 삭제 수정은 무조건 pk값(i_board)이 필요하다-->

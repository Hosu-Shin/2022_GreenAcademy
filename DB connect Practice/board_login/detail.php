<?php
    include_once "db/db_board.php";   
    $i_board = $_GET['i_board'] ;
    $file = $_FILES['file'];
    $param = [
        "i_board" => $i_board
    ];

    $item = sel_board($param);

    $next_num = sel_next_board($param);
    $prv_num = sel_prev_board($param);

    session_start(); //수정버튼 때문에 session start()넣었음
    if(isset($_SESSION['login_user'])) {
    $login_user = $_SESSION["login_user"];
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "css/detail.css" />
    <title><?=$item["title"]?></title>
</head>
<body>
    <div id = "name"><a href="list.php">리스트</a></div>
    <?php if(isset($_SESSION['login_user']) && $login_user['i_user'] === $item['i_user']) { ?>
    <div>
        <a href="mod.php?i_board=<?=$i_board ?>"><button>수정</button></a>
        <button onclick = "isDel();" >삭제</button> <!--함수 호출 부분-->
    </div>
    <?php } ?>
    <div class = "detail">
        <div>제목 : <?=$item['title']?></div>
        <div>글쓴이 : <?=$item['nm']?></div>
        <div>등록일시 : <?=$item['created_at']?></div>
        <!-- <div><파일 : <img src='upload/<?=$item['file']?>'>></div> -->
        <?php if($item['file'] !== ""){
            echo "<div><img src='upload/".$item["file"]."'></div>";
        }?>
        <div> <?=$item['ctnt']?> </div>
    </div>
    <div class = "button">
        <?php if($prv_num !== 0) { ?>
            <div><a href = "detail.php?i_board=<?=$prv_num?>"><button>이전글</button></a></div>
        <?php } ?>
        <?php if($next_num !== 0) { ?>
            <div><a href = "detail.php?i_board=<?=$next_num?>"><button>다음글</button></a></div>
        <?php } ?>
    </div>
    <!-- <div>
        이전글
        <?php if($i_board - 1 == 0 ) {
        ?> 등록된 이전글이 없습니다. </span>
    </div>
    <?php
        } else {
            $conn = get_conn();
            $prev_num = $i_board - 1;
            $prev_sql = "SELECT i_board 
                         FROM t_board
                         WHERE i_board < '${i_board}'
                         ORDER BY i_board DESC
                         LIMIT 1;
                        ";
            $prev_result = mysqli_query($conn, $prev_sql);
        }
        ?>
        <a href = "detail.php?i_board=<?=$prev_num?>"></a> -->

    <script>
        function isDel() { //함수 정의 부분
            console.log('isDel 실행 됨');
            //const result = confirm('삭제할거야? ༼;´༎ຶ ۝༎ຶ`༽  '); //소괄호는 대부분 함수
            //if(result) {
            if(confirm('삭제할거야? ༼;´༎ຶ ۝༎ຶ`༽  ')) { //보통 윗 줄처럼 안 쓰고 이런 식으로 작성
            // console.log('삭제할거야ψ(｀∇´)ψ'); //true를 return하고
            // } else {
            //     console.log('삭제 안 할게( ´･･)ﾉ(._.`)'); //false를 return 한다
                location.href = "del.php?i_board=<?= $i_board ?>";
            }
        }
    </script>

</body>
</html>

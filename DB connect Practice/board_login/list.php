<?php
    include_once "db/db_board.php";
    session_start(); // header 때문에 session start()가 있음
    $nm = "";

    // $page = $_GET['page'];
    // if(!$page) {
    //     $page = 1;
    // } else {
    //     $page = intval($page);
    // }
    // print "page : " . $page;

    $page = 1;
    if(isset($_GET['page'])) {
        $page = intval($_GET['page']);
    }

    if(isset($_SESSION["login_user"])) { //만약 session에 login_user가 세팅이 되어 있다면(isset)
        $login_user = $_SESSION["login_user"];
        $nm = $login_user["nm"];
        //echo $nm , "님 환영합니다"; - 이렇게 만들 경우 위치를 따로 잡을 수가 없음
    }

    $row_count = 5;
    $param = [
        "row_count" => $row_count,
        "start_idx" => ($page - 1) * $row_count
    ];
    $total_page = sel_paging_count($param);
    $list = sel_board_list2($param);
    
    $page_count = 3;

    $total_block = ceil($total_page/$page_count);
    $now_block = ceil($page/$page_count);

    $s_pageNum = ($now_block-1) * $page_count+1;

    if($s_pageNum <= 0) {
        $s_pageNum = 1;
    };

    $e_pageNum = $now_block * $page_count;

    if($e_pageNum > $total_page) {
        $e_pageNum = $total_page;
    };

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href="css/common.css" />
    <title>리스트</title>
</head>
<body>
    <div id = "container">
        <header>
            <?= isset($_SESSION["login_user"]) ? $nm . "님 환영합니다" : "" ?> <!--로그인이 되어 있으면 작동-->
            <div class = "list">
                <!-- <a href="list.php">리스트</a> -->
                <?php if(isset($_SESSION["login_user"])) { ?>
                    <a href = "write.php">글쓰기</a>
                    <a href = "logout.php">로그아웃</a>
                <?php } else { ?>
                    <a href = "login.php">로그인</a>
                <?php } ?>
                
                <!-- <a href="write.php">글쓰기</a>
                <a href="logout.php"><?= isset($_SESSION["login_user"]) ? "로그아웃" : "<a href='login.php'>로그인</a>" ?></a> -->
                
            <!--<?= isset($_SESSION["login_user"]) //3항식으로, login이 되면 ?문장, login이 안되면 :문장 출력
                    ? "<a href='logout.php'>로그아웃</a>" 
                    : "<a href='login.php'>로그인</a>" 
                ?> -->
           
            </div>
        </header>
        <main>
            <h1><a href="list.php">리스트</a></h1>
            <div id = "table">
                <table>
                    <thead>
                        <tr>
                            <th>글번호</th>
                            <th>제목</th>
                            <th>작성자명</th>
                            <th>등록일시</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        //<?php while($item = mysqli_fetch_assoc($list)) {} ?> 
                        
                        <?php foreach($list as $item) {?> 
                            <tr>
                                <td><?=$item["i_board"]?></td> 
                                <td><a href = "detail.php?i_board=<?=$item['i_board']?>"><?=$item["title"]?></a></td>
                                <td><?=$item["nm"]?></td>
                                <td><?=$item["created_at"]?></td>
                            </tr>
                        <?php } ?>
                    
                    </tbody>
                </table>
            </div>
            <div class = "num">
                <?php
                if($page > 1){
                    echo "<a href='list.php?page=" .($page-1). "'>◁</a>";
                } 
                    for($i=$s_pageNum; $i <= $e_pageNum; $i++) { ?>
            
                       <span class = "<?= $i==$page ? "pageSelected" : "" ?>">
                        <a href = "list.php?page=<?= $i ?>"><?= $i ?></a>
                    </span>
                <?php } ?>
                <?php
                if ($page < $total_page) {
                    echo "<a href='list.php?page=" .($page+1). "'>▷</a>";
                }
                ?>
            </div>
            <div>

            </div>
        </main>
    </div>
</body>
</html>

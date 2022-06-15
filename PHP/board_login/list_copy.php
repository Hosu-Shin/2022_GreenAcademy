<?php
    include_once "db/db_board.php";
    include_once "db/db.php";

    session_start(); // header 때문에 session start()가 있음
    $nm = "";

    if(isset($_SESSION["login_user"])) { //만약 session에 login_user가 세팅이 되어 있다면(isset)
        $login_user = $_SESSION["login_user"];
        $nm = $login_user["nm"];
        //echo $nm , "님 환영합니다"; - 이렇게 만들 경우 위치를 따로 잡을 수가 없음
    }

// 페이지
    // $page = $_GET['page'];
    // if(!$page) {
    //     $page = 1;
    // } else {
    //     $page = intval($page);
    // }
    // print "page : " . $page;


//페이지를 선택하지 않은 상태라면 기본 page = 1로 세팅
    $page = 1;
    if(isset($_GET['page'])) {
        $page = intval($_GET['page']);
    }

    $row_count_list = array(5, 10);
    
    
    if(isset($_POST['board_list_count'])){
        $row_count = $_POST['board_list_count'];
    } else {
        $row_count = $row_count_list[0];
    }

//검색 기능
    $search_txt = "";
    if(isset($_GET["search_txt"])) {
        $search_txt = $_GET["search_txt"];
    }
    print "search_txt : {$search_txt}";



    $param = [
        "start_idx" => ($page - 1) * $row_count,
        "row_count" => $row_count,
        "search_txt" => $search_txt,
    ];
    
    $total_page = sel_paging_count($param);

    $list = sel_board_list2($param);


    $conn = get_conn();
    $qurey = "SELECT date(NOW()) as dat";

    date('Y')."-".date('m')."-".date('d'); 
   
    $result = mysqli_query($conn, $qurey);
    $row = mysqli_fetch_assoc($result);

    
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

    function select_check($row_count, $count) {
        if($row_count == $count) {
            echo "<option value=".$count." selected>";
        } else {
            echo "<option value=".$count.">";
        }
    }

//검색버튼을 눌렀거나, 검색어가 존재한다면
    // if(isset($_GET['search_input_txt']) && $_GET['search_input_txt'] !== "") {
    //     $param += [
    //         "search_select" => $_GET["search_select"], //select 박스 value값
    //         "search_input_txt" => $_GET["search_input_txt"] //검색어
    //     ];
    //     //DB조회 전달 후 결과 list를 받아온다
    //     $list = search_board($param);
    // }

    list($today, $total) = visit();

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
                    <a href="profile.php">
                        프로필
                        <?php
                            $session_img = $_SESSION["login_user"]["profile_img"];
                            $profile_img = $session_img == null ? "basic.jpg" : $_SESSION["login_user"]["i_user"] . "/" . $session_img;
                        ?>
                        <div class="circular__img wh40">
                        <img src = "/board_login/img/profile/<?=$profile_img?>" width="50">
                        </div>
                    </a>
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
            <form method = "POST">
                <div id = "select">
                    <select name = "board_list_count" id = "select2" onchange = this.form.submit()>
                        <?php
                        for ($i=0; $i < count($row_count_list); $i++) {
                        
                            echo select_check($row_count, $row_count_list[$i]).$row_count_list[$i]. "개</option>";
                        }
                        ?>
                    </select>
                </div>
            </form>
            <div>
                <div>Total : <?= $total ?> </div>
                <div>Today : <?= $today ?> </div>
            </div>
            <div id = "table">
                <table>
                    <thead>
                        <tr>
                            <th>글번호</th>
                            <th>제목</th>
                            <th>작성자명</th>
                            <th>등록일시</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list as $item) {?> 
                            <tr>
                                <td><?=$item["i_board"]?></td> 
                                <td><a href = "detail_copy.php?i_board=<?=$item['i_board']?>&page=<?=$page?><?= $search_txt != "" ? "&search_txt=" . $search_txt : ""?>"><?=str_replace($search_txt, "<mark>{$search_txt}</mark>", $item["title"])?></a></td>
                                <td><?=$item["nm"] ?>
                                <?php $profile_img = $item["profile_img"] == null ? "basic.jpg" : $item["i_user"] . "/" . $item["profile_img"];
                                ?>  
                                <div class="circular__img wh40">
                                    <img src = "/board_login/img/profile/<?= $profile_img?>">
                                </div>
                                </td>
                                <td>
                                    <?php 
                                    if ($row['dat'] === $item['date']) {
                                        echo $item['time'];
                                    } 
                                    else {
                                        echo $item['date'];
                                    }
                                    ?>
                                </td>
                                <td><?= $item["view"]?></td>
                            </tr>
                        <?php } ?>
                    
                    </tbody>
                </table>
            </div>
            <div>
                <form action="list_copy.php" method="get">
                    <div>
                        <input type="search" name="search_txt" value="<?=$search_txt?>">
                        <input type="submit" value="검색">
                    </div>
                </form>
            </div>
            <div>
                <?php for($i=1; $i<=$total_page; $i++) { ?>
                     <!-- 선택한 페이지 css 먹이기 위해 class를 if문으로 돌림 -->
                    <span class= "<?= $i==$page ? "pageSelected" : "" ?>">
                        <a href = "list_copy.php?page=<?=$i?><?= $search_txt != "" ? "&search_txt=" . $search_txt : ""?>"><?=$i?></a>
                        <!--
                            페이지가 넘어가도 검색한 내용이 남아 있도록 하는 것
                            <?= $search_txt === "" ? "" : "&search_txt={$search_txt}" ?>으로 사용할 수도 있다
                        -->
                    </span>
                <?php } ?>
            </div>
        </main>
    </div>
</body>
</html>
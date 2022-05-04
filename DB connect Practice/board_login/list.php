<?php
    include_once "db/db_board.php";
    include_once "db/db.php";

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


    $row_count_list = array(5, 10, 15, 20);
    
    
    if(isset($_POST['board_list_count'])){
        $row_count = $_POST['board_list_count'];
    } else {
        $row_count = $row_count_list[0];
    }

    $param = [
        "row_count" => $row_count,
        "start_idx" => ($page - 1) * $row_count
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
    if(isset($_POST['search_input_txt']) && $_POST['search_input_txt'] !== "") {
        $param += [
            "search_select" => $_POST["search_select"], //select 박스 value값
            "search_input_txt" => $_POST["search_input_txt"] //검색어
        ];
        //DB조회 전달 후 결과 list를 받아온다
        $list = search_board($param);
    }

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
            <!-- <div>
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
            </div> -->
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
                            <!-- <th>test</th> -->
                            <th>조회수</th>
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
                                <!-- <td><?=$item["date"]?></td> -->
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
                                    
                                <!-- <td>
                                    <?php
                                    if ($item['date'] == date('Y')."-".date('m')."-".date('d')) {
                                        echo  $item['time'];
                                    } else {
                                        echo $item['date'];
                                    }
                                    ?>
                                </td> -->
                                <td><?= $item["view"]?></td>
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
                        <!--타입이 달라서 ""로 출력되었기 때문에 class가 안 먹힘, 그래서 ==로 값만 같도록 조정함-->
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
            <form method = "POST" action = "list.php">
                <div>
                    <select name = "search_select" id = "">
                        <option value = "search_writer">작성자</option>
                        <option value = "search_title">제목</option>
                        <option value = "search_ctnt">제목+내용</option>
                    </select>
                    <div>
                        <input type = "text" name ="search_input_txt">
                        <input type = "submit" value = "검색">
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>
</html>

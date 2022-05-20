<?php
    include_once 'db/db_list.php';

    $main_zone_list = sel_main_zone_list();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel = "stylesheet" type = "text/css" href = "css/main.css" />
</head>
<body>
    <?php include_once "header.php";?>
    <div class="main_img"><img src="img/back.jpg" alt="메인이미지"></div>
    <div class="main_text"><h2>우리 동네 카페 둘러보기</h2></div>
    <div class="main_li">
        <?php
            while($row = mysqli_fetch_assoc($main_zone_list))
            {
                $zone_num = $row['zone_num'];
                $img = $row['img'];
                $zone_nm = $row['zone_nm'];
            ?> 
            <ul class = "main_ul">
                <li><a href='list1.php?zone_num=<?=$zone_num?>'><img src=<?=$img?> width=300px; height=300px></li>
                <li><span><?=$zone_nm?><span></a></li>
            </ul>
            <?php
                //echo "<li><a href='list1.php?zone_num=$zone_num'><img src='$img' width=300px; height=300px>$zone_nm</a></li>";
            }
        ?>
    </div>
    <footer>
    <h4>Copyright &copy; 2022 Café Inc. All rights reserved.<br> 조현민 신소연 <span class="fade-out-box">이성찬</span><br>(Special Thanks To. 이혜빈, 신혜미, 남그린, 신원영, 김준일, 김대홍, 이경식, 김동휘)</h4>
    </footer>
</body>
</html>


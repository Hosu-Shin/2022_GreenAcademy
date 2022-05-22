<?php
    include_once "db/db_cafe.php";

    

    session_start();

    $user = "";
    if(isset($_SESSION['login_user'])) {
        $login_user = $_SESSION['login_user'];
        $user = $login_user['name'];
    }

    $menu_num = $_GET["menu_num"];
    $cafe_num = $_GET["cafe_num"];
    $zone_num = $_GET["zone_num"];
    
    $param = [
        "u_num" => $login_user['u_num'],
        "menu_num" => $menu_num,
        "cafe_num" => $cafe_num,
        "zone_num" => $zone_num
    ];
    
    $result = sel_cafe($param);
    $sel_menu = sel_menu($param);

    $arr = mysqli_fetch_assoc($result);
    $row = mysqli_fetch_assoc($sel_menu);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel = "stylesheet" type = "text/css" href = "css/write.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>mod_menu</title>

</head>
<body>
    <?php include_once "header.php" ?>

    <aside>
        <h2>My Page</h2>
        <div><a href = "write.php">매장 등록하기</a></div>
        <div><a href = "menu.php">매장 관리하기</a></div>
    </aside>
    <div class = "container">
        <h2>매장 관리하기</h2>
            <div class = "login_user">
                <?=isset($_SESSION['login_user']) ? "<div>[". $arr['cafe']."] 매장을 관리합니다.</div>" : "" ?>
            </div>
            <form method = "post" action = "mod_proc.php">
                <input type = "hidden" name = "menu_num" value = "<?=$menu_num?>">
                <input type = "hidden" name = "cafe_num" value = "<?=$cafe_num?>">
                <input type = "hidden" name = "zone_num" value = "<?=$zone_num?>">
            <table class = "table">
                <tr>
                    <th>메뉴 수정하기</th>
                    <td><input type = "text" name = "menu" class="" value = "<?=$row['menu']?>" placeholder="메뉴 이름" required></td>
                </tr>
                <tr>
                    <th>가격 수정</th>
                    <td><input type = "text" name = "won" class = "aligin" size="15" value = "<?=$row['won']?>" placeholder="원" required></td>
                </tr>
            </table>
                    <div>
                        <input type = "submit" value="메뉴 수정하기" class = "custom-btn submit">
                    </div>
            </form>
    </div>
</body>
</html>
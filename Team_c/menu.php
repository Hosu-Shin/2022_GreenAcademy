<?php
    include_once "db/db_cafe.php";

    session_start();

    $user = "";
    if(isset($_SESSION['login_user'])) {
        $login_user = $_SESSION['login_user'];
        $user = $login_user['name'];
    }

    $param = [
        "u_num" => $login_user['u_num']
    ];
    
    $result = sel_cafe($param);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel = "stylesheet" type = "text/css" href = "css/write.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>menu</title>

</head>
<body>
    <?php include_once "header.php" ?>
    
    <aside>
        <h2>My Page</h2>
        <div><a href= "write.php">매장 등록하기</a></div>
        <div><a href = "menu.php">메뉴 등록하기</a></div>
    </aside>
    <div class = "container">
        <h2>메뉴 등록하기</h2>
            <div id ="login_text" class = "login_user">
                <?=isset($_SESSION['login_user']) ? "<div>[". $user . "] 님 환영합니다.</divs=>" : "" ?>
            </div>
        <form method = "post" action = "menu_proc.php">
            <table class = "table">
                <tr>
                    <th>메장 선택</th>
                    <td>
                    <select name = "cafe_num" id = "">
                        <option value = "">매장을 선택해주세요</option>
                        <?php
                            while($row = mysqli_fetch_assoc($result)) { ?>
                        <option value = "<?= $row['cafe_num']?>"><?= $row['cafe']?></option>
                        <?php } ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th>메뉴 등록</th>
                    <td>
                        <input type = "text" name = "menu" class="" placeholder="아메리카노" required>
                    </td>
                </tr>
                <tr>
                    <th>가격 등록</th>
                    <td>
                    <input type = "text" name = "won" class = "aligin" size="15" value = "<?=$row['won']?>" placeholder="원" required>
                    </td>
                </tr>
            </table>
                <div>
                    <input type = "submit" value="메뉴 등록하기" class = "custom-btn submit">
                </div>
        </form>
    </div>
</body>
</html>
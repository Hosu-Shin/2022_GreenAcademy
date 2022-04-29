<?php

    session_start();
    $nm = "";
    if(isset($_SESSION["login_user"])) {
        $login_user = $_SESSION["login_user"];
        $nm = $login_user["nm"];
        //echo $nm , "님 환영합니다"; - 이렇게 만들 경우 위치를 따로 잡을 수가 없음
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>리스트</title>
</head>
<body>
    </div>
    <?php if(isset($_SESSION["login_user"])) { ?>
    <div><?= $nm ?>님 환영합니다.</div>
    <?php } ?>
    <?php if(isset($_SESSION["login_user"])) {
        echo "<div>", $nm, "님 환영합니다.</div>";
    } ?>
    <?= isset($_SESSION["login_user"]) ? $nm . "님 환영합니다" : "" ?>
    <h1>리스트</h1>
</body>
</html>
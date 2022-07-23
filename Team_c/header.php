<?php
    include_once 'db/db_list.php';
    include_once 'db/db_user.php';
    $zone_list = [1, 2, 3, 4, 5, 6, 7, 8];
    if(isset($_GET['zone']))
    {
        $zone_num = $_GET['zone'];
    }
    else
    {
        $zone_num = $_GET['zone_num'];
    }

    session_start();
    if(isset($_SESSION['login_user']))
    {
        $login_user = $_SESSION['login_user'];
        $name = $login_user['name'];
        $ment = "${name}";
        $log = "<a href='logout.php'>Logout</a>";
        $myPage = "<a href='write.php'>myPage</a>";
    }
    else
    {
        $join = "<a href='join.php'>Join</a>";
        $log = "<a href='login.php'>Login</a>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel = "stylesheet" type = "text/css" href = "css/header.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="main.js" defer></script>
</head>
<body>
    <header>
    <nav class = "navbar">
        <div class="navbar_logo">
            <a href = "main.php"><i class="fas fa-coffee"></i>
            <span>Café</span></a>
            <!-- <audio controls autoplay loop id="myAudio">
                <source src="https://win-web-nf01-sycdn.kuwo.cn/e0670e20a07e948ee2fbc08375efc074/6289f02c/resource/n3/50/68/763946567.mp3" type = "audio/mp3">
            s</audio> -->
            <!-- <button class="btn1"><i class="fa-solid fa-headphones"></i></button>
            <script>
                // document.getElementById('myAudio').play();
                document.querySelector(".btn1").addEventListener("click", function () {
                var audio1 = new Audio("https://win-web-nf01-sycdn.kuwo.cn/66beb8805d6b55261947e1f1de563d05/628a1e6d/resource/n3/50/68/763946567.mp3");
                audio1.loop = false; // 반복재생
                audio1.volume = 0.5; // 음량 설정
                audio1.play(); // sound1.mp3 재생
            });
            
            // 음악 : https://www.musicenc.com/article/46228.html
            // 참고 : https://mjmjmj98.tistory.com/31
            </script> -->
        </div>
        <ul class="navbar_links">
            <li><span class="host_ment"><?=$ment?></span>님 환영합니다</li>
            <li><?=$myPage?></li>
            <li><?=$log?></li>
            <li><?=$join?></li>
        </ul>
</header>
        <a href="#" class="navbar_toogleBtn">
            <i class="fa-solid fa-bars"></i>
        </a>
    </nav>
</body>
</html>
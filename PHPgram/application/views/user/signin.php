<!DOCTYPE html>
<html lang="en">
<?php include_once "application/views/template/head.php"; ?>
<body class="h-full container-center">
    <div>
        <h1>로그인</h1>
        <div class = "err">
            <?php
                if(isset($_GET["err"])) {
                    print "로그인을 할 수 없습니다.";
                }
            ?>
        </div>
        <!-- post방식은 무조건 form 태그의 method가 post일 때
            나머지는 모두 get방식(주소창에 직접 입력, 주소차에 쿼리스트링 붙은 거, 클릭, a태그 등으로 화면 이동 하는거) -->
        <form action="signin" method="post">
            <div><input type="email" name="email" placeholder="email"
                        value="<?=getParam('email')?>" autofocus required>
                        <!-- isset($_GET['email']) ? $_GET['email'] : "" 을 함수로 만들어서 사용 중-->
            </div>
            <div><input type="password" name="pw" placeholder="password" required></div>
            <div>
                <input type="submit" value="로그인">
            </div>
        </form>
        <div>
            <a href="signup">회원가입</a>
        </div>
    </div>
</body>
</html>
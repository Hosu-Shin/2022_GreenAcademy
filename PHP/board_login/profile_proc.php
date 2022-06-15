<?php

    include_once "db/db_user.php";

    session_start();
    define('PROFILE_PATH', 'img/profile/');

    $login_user = $_SESSION['login_user'];
    //$login_user = &$_SESSION['login_user'];
    //&값을 주면 주소값을 가져와 복사하는 것으로 얕은 복사가 된다 -> session을 따로 바꾸지 않아도 됨

    var_dump($_FILES);
    if($_FILES['img']['name'] === "") {
        echo "이미지 없음";
        exit;
    }

    function gen_uuid_v4() { 
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', 
        mt_rand(0, 0xffff), 
        mt_rand(0, 0xffff), 
        mt_rand(0, 0xffff), 
        mt_rand(0, 0x0fff) | 0x4000, 
        mt_rand(0, 0x3fff) | 0x8000, 
        mt_rand(0, 0xffff), 
        mt_rand(0, 0xffff), 
        mt_rand(0, 0xffff) 
        ); 
    }
    $img_name = $_FILES['img']['name'];
    //파일명 알아냄
    $last_index = mb_strrpos($img_name, "."); //mb_strropos : img_name에서 "." 의 위치를 문자 왼쪽에서 부터 찾음
    //파일 명에서 점의 위치를 알아 냄
    $ext = mb_substr($img_name, $last_index); //mb_substr : 문자열 자르기 (자르고 싶은 문자열, 어디서 부터 자를 지 시작위치, 얼마나 자를 것인지)

    $target_filenm = gen_uuid_v4() . $ext; //우리가 저장할 파일명
    $target_full_path = PROFILE_PATH . $login_user['i_user'];
    if(!is_dir($target_full_path)) {
        mkdir($target_full_path, 0777, true);
    }

    $tmp_img = $_FILES['img']['tmp_name'];
    $imageUpload = move_uploaded_file($tmp_img, $target_full_path . "/" . $target_filenm);
    if($imageUpload) { //업로드 성공!
        //if문 안에 변수가 있다면 boolin type이다

        //이전에 등록된 프사가 있으면 삭제!
        if($login_user["profile_img"]) {
            $saved_img = $target_full_path . "/" . $login_user["profile_img"];
            if(file_exists($saved_img)) { //파일이 있는지 확인
                unlink($saved_img); //파일 지우는 변수
            }
        }

        //DB에 저장
        $param = [
            "profile_img" => $target_filenm,
            "i_user" => $login_user["i_user"]
        ];

        $result = upd_profile_img($param);

        //session값을 안 바꿔 주면 이미지가 생성만 된다
        $login_user["profile_img"] = $target_filenm; //세션의 값을 바꿔 줘야 함
        $_SESSION["login_user"] = $login_user; //위에서 얕은 복사를 할 경우엔 필요없는 작업
        
        Header("Location: profile.php");
    } else {
        echo "업로드 실패";
    }

    // echo "ext : " . $ext;

?>
<?php

    include_once "db/db_user.php";

    $uid = $_POST['uid'];
    $upw = $_POST['upw'];
    $upw_com = $_POST['confirm_upw'];
    $nm = $_POST['nm'];
    $gender = $_POST['gender'];

    
   $param = [
       "uid" => $uid,
       "upw" => $upw,
       "nm" => $nm,
       "gender" => $gender
   ];

    $result = ins_join($param); 
    //리턴값

    echo "result : ", $result, "<br>";
    echo "uid : ", $uid, "<br>";
    echo "upw : ", $upw, "<br>";
    echo "PW_com : ", $upw_com, "<br>";
    echo "nm : ", $nm, "<br>";

    header("Location: login.php");
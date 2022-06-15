<?php
    //함수 (function)

    /*
    객에 안에 함수가 있으면 method(메소드)라고 부른다
    객체 안이 아니라면 function(함수)라고 부른다
    */

    function sum($n1, $n2) 
    /* function [함수명]([매개변수]){
        [소스코드];
    }
       -함수명은은 아무거나 해도 됨
    */
    {
        return $n1 + $n2;
    }

    $result = sum(10, 20);

    print "result : $result <br>";
    print "result : " . sum(30, 40) . "<br>";

    print "<br>";

    $result = plus(10, 11);

    print "썸 : $result <br>";
    print "sum : " . plus(30, 40) . "<br>";

    minus(35,21);
    minus(10,2);

    print "r : ". $r . "<br>";

    function plus($n1, $n2)
    {
        return $n1 + $n2; //n1+n2의 값을 가지고 다시 돌아간다
    }

    function minus($n1, $n2)
    {
    print "minus : " . ($n1 - $n2) . "<br>";
    return;
    }
?>
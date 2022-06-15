<?php
    //Access modifier
    //접근 제어자, 접근 지시어, 접근제어 지시자 등으로 불린다
    //public, protected, private 3개


    class Student { //객체를 만들때는 대문자로 시작
        public $studentId;
        public $studentName;

        // public function printStudent($id, $name) {
        //     print "ID : {$id}<br>";
        //     print "Name : {$name}<br>";
        // }

        public function printStudent() {
            print "ID : {$this -> studentId}<br>";
            print "Name : {$this -> studentName}<br>";
        }
    }

    $obj = new Student; //new 필수 + 원하는 객체 이름
    $obj -> studentId = 20220614; //'->'는 자바스크립트에서 '.'과 동일한 기능
    $obj -> studentName = "Alice";
    
    $obj -> printStudent($obj -> studentId, $obj -> studentName); //printStudent는 void method (return해 주는 것이 없음)

    //객체는 매소드 가질 수 있고, 배열은 매소드 가질 수 없음 (배열은 혼자 자체적으로 움직일 수 없다, 접근 지시어가 없음)
<?php
    
    class Student {
        //상수만 public 가능하고 나머지는 다 private, protected
        private $studentId;
        private $studentName;

        //getters
        public function getStudentId() { //getter는 parameter 받는거 없음
            return $this -> studentId;
        }
        
        public function getStudentName() {
            return $this -> studentName;
        }

        //setters
        public function setStudentID($studentId) {
            $this -> studentId = $studentId; //parameter가 있는 대신 return이 없음
            return $this; //호출한 애의 this값이므로 호출한 애에 따라 값이 바뀜
        }

        public function setStudentName($studentName) {
            $this -> studentName = $studentName;
        }

        public function printStudent() {
            print "ID : {$this -> studentId}<br>";
            print "Name : {$this -> studentName}<br>";

        }
    }
    
    $obj = new Student;
    $obj -> setStudentID(20220613);
    $obj -> setStudentName("Aurora");
    $obj -> printStudent();

    print $obj->setStudentID(1122)->getStudentId() . "<br>"; //return $this가 있어서 가능


<?php

    class Student {
        private $studentId;
        private $studentName;

        public function printStudent($id, $name) {
            print "ID : {$id}<br>";
            print "Name : {$name}<br>";

        }
    }
    
    $obj = new Student; 
    $obj -> printStudent(20220614, "Alice");


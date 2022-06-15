<?php

    class People {
        protected $name;
        protected $age;
        

        function printPeople() {
            print "Name : {$this -> name}<br>";
            print "Age : {$this -> age}<br>";
        }
    }

    $obj = new People;
    $obj -> printPeople();
    print "----------------<br>";

    class Student1 extends People {
    //상속할 때 extends 사용 (내부적으로 참조하는 것일 뿐, 소스가 복사되서 들어오는 것이 아님)
        private $studentId;

        function __construct($name, $age, $id)
        {
            print "나는 Student요. <br>";
            $this -> name = $name;
            $this -> age = $age;
            $this -> studentId = $id;
        }

        function printStudent() {
            print "- Student - <br>";
            $this -> printPeople(); //$stu1 -> printPeople(); 이거와 같음
            //parent::printPeople(); //현재 class 안에 printPeople()이 있어도 부모값에서 printPeople()을 찾음
            print "Id : {$this -> studentId}<br>";
        }

        //Overriding (덮어씌우기 ; 부모의 것을 사용하지 않고 새롭게 정의해서 사용함)
        function printPeople() {
            print "Student에 있는 print People <br>";
        }
    };

    $stu1 = new Student1("홍길동", 21, 1010);
    $stu1 -> printPeople();
    print "-------------<br>";
    $stu1 -> printStudent();

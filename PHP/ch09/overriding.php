<?php

    class Animal {
        function crying() {
            print "< 동물이 운다 ><br>";
        }
    }

    class Dog extends Animal {
        function crying() {
            print "강아지는 멍멍🐶<br>";
        }
        function grandDogCrying() {
            parent::crying();
        }
    }

    class LabDog extends Dog {
        function crying() {
            parent::grandDogCrying();
            print "래브라도는 컹컹🐕<br>";
        }
    }

    class Cat extends Animal {
        function crying() {
            print "고양이는 냥냥😺<br>";
        }
    }

    class Human {
        function sepak() {
            print "사람이 짖는다!";
        }
    }

    function doCry($ani) {
        if(method_exists($ani, "crying")) {
            $ani -> crying();
        } else {
        print "crying 매소드 없음!";
        }
    }

doCry(new Animal);
doCry(new Dog);
doCry(new Cat);
doCry(new LabDog);
//만약 LabDog에 crying 매소드가 없으면 Dog로 올라간다
//LabDog에서 바로 Animal로 가려면 조건을 만들어 주면 됨
doCry(new Human);
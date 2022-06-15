<?php

//Class : memberField와 memberMethod로 구성될 수 있는 것 (일종의 설계도)
    class Fruit {
    //memberField (method가 아닌 애들 ; 변수, 상수) 혹은 Property
        private $name;
        private $color;
        private $price;
        //public const DDD = 'ddd';
    //-------------------------------------------------------
    
        function __construct()
        {
            return $this;
        }
        
    //memberMethod
        public function print_fruit() {
            print "Nmae : {$this -> name} <br>";
            print "Color : {$this -> color} <br>";
            print "Price : {$this -> price} <br>";
        }

        public function setName($name) {
            $this -> name = $name;
            return $this;
        }

        public function setColor($color) {
            $this -> color = $color;
            return $this;
        }

        public function setPrice($price) {
            $this -> price = $price;
            return $this;
        }
    }
    //finction과 method 차이 : 객체 안에 있으면 method, 객체 밖에 있으면 function

    $apple1 = (new Fruit) -> setName("사과");
    $apple1->print_fruit();

    $apple2 = (new Fruit) -> setColor("파랑")
                          -> setPrice(1000);

    $apple2 -> print_fruit();

    $banana1 = new Fruit;
    $banana1 -> setName('바나나');
    $banana1 -> setColor('초록');
    $banana1 -> setPrice(1200);
    $banana1 -> print_fruit();
<?php
    class Fruit {
        private $name;
        private $color;
        private $price;

        //__construct : 기본생성자
        //private한 memberfield에 값을 넣는 방법 : 1)생성자를 통해, 2)setter method를 통해서
        //private한 memberfield의 값을 가져오는 방법  : getter method를 통해

        function __construct($name, $color, $price) { //이렇게 만들면 무조건 3개의 값이 들어 있어야 함
            $this -> name = $name;
            $this -> color = $color;
            $this -> price = $price;
        }

        public function print_fruit() {
            print "Nmae : {$this -> name} <br>";
            print "Color : {$this -> color} <br>";
            print "Price : {$this -> price} <br>";
        }
    }

    $apple = new Fruit("Apple", "red", 1000);
    $banana = new Fruit("Banana", "yellow", 500);

    $apple -> print_fruit();
    $banana -> print_fruit();
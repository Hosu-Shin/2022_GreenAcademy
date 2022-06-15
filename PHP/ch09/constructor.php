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

    //오버로딩(Overloading), 오버라이딩(Overriding)


    /*
    //기본 값을 주면 따로 값을 넣어 주지 않을 때 기본 값이 입력된다
    function __construct($name=null, $color=null, $price=null) {
        $this -> name = $name;
        $this -> color = $color;
        $this -> price = $price;
    }
    $apple2 = new Fruit();
    $apple2 = new Fruit(null, 500);
    $apple2 -> print_fruit();
    */
    
    
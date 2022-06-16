<?php

    class Computer {
        public static $brand;
        public $price;

        function __construct()
        {
            self::$brand = "ㅎㅎ";
        }

        function myPrint() {
            print "Computer Brand is \"" . (self::$brand) . "\", Price is {$this->price}.<br>";
            //= (Computer::$brand)
        }
        
        static function myStaticComputer() {
            print "Computer Brand is \"" . (self::$brand) . "\", Price is {$this->price}.<br>";
            //❗static은 메모리에 올라가고 싶은데, $this는 new라는 것을 써야 메모리에 올라갈 수 있기 때문에 $this에서 에러남 
            //객체마다 다른 값을 쓰고 싶다면 static 쓰면 안됨 
        }

    }

    Computer::$brand = "LG";

    $com = new Computer;
    $com->price = 10000;
    $com->myPrint();
    
    $com2 = new Computer;
    $com2->price = 20000;
    $com2->myPrint();
    

    Computer::$brand = "SAMSUNG";
    $com->myPrint();
    $com2->myPrint();

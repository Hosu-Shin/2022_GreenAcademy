<?php

    class Computer {
        private static $brand;
        public $price;

        function __construct()
        {
            $this->init();
        }

        function init() {
            self::$brand = "ㅎㅎ";
        }

        static function setBrand($brand) {
            self::$brand = $brand;
        }

        function myPrint() {
            print "Computer Brand is \"" . self::$brand . "\", Price is {$this->price}.<br>";
            //= (Computer::$brand)
        }
        

    }

    $com = new Computer;
    $com->price = 10000;
    $com->myPrint();
    
    $com2 = new Computer;
    $com2->price = 20000;
    $com2->myPrint();
    

    Computer::setBrand("SAMSUNG");
    $com->myPrint();
    $com2->myPrint();

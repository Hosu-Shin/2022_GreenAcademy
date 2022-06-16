<?php

    class Calc{
        function sum($n1, $n2) {
            return $n1 + $n2;
        }
    }

    //Calc를 객체화 변수명은
    //sum 매소드를 호출, 5, 10더한 값을 리턴받고 화면에 출력

    $c = (new Calc)->sum(5, 10);
    print $c . "<br>";
    //c에 함수 호출 값을 다 담았기 때문에 c만 프린트 하면 됨


    $c = new Calc(); //객체화❗
    print $c->sum(5, 10) . "<br>";
    //c에 Calc만 담겨있으므로 프린트 할 때 함수 호출 해 줘야함
 

    print "------------------------<br>";


    class StaticCalc {
        static function sum($n1, $n2) {
        return $n1 + $n2;
        }
    }

    $c = StaticCalc::sum(10, 10);
    print $c;
    //static function은 만들자 마자 메모리에 올라갔으므로 new없이 바로 사용가능
    //사용할 때는 '->' 말고 '::' 를 사용한다
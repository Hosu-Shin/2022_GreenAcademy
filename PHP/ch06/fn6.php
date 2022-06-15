<?php
/*
문제) 
    별찍기
    $star = 3
    ***

    $star=5
    *****
    
*/

    $star = rand(3, 10);

    echo "STAR : ${star} <br>";
    
    print_star($star);

    function print_star($z){
        echo "STAR : ${z} <br>";
        for($i = 1 ; $i <= $z ; $i++){
            echo "*";
        }
        print "<br>";
    }

    print "<br>------------------</br>";

    print_star_line($star);

    function print_star_line($star) {
        echo "STAR : ${star} <br>";
        $q=0;
        for($i = $q ; $i < $star ; $i++){
            for($q = 0 ; $q < $star ; $q++)
            {
                echo "*";
            }
            print "<br>";
        }
    }

    /*강사님 답(1)

    function print_star_line($star){
        for($i=0; $i < $star ; $i++){
            for($z=0; $z<$star; $z++){
                print "*";
            }
            print "<br>";
        }
    }

    //강사님 답(2)
    function print_star_line($star){
        for($i=0; $i < $star ; $i++){
            print_star($star);
            print "<br>";
        }
    }
    */

    /*
    문제) star=3
        *
        **
        ***
    */
    print "<br>------------------</br>";

    echo "STAR : ${star} <br>";

    print_star_triangle($star);
    
    function print_star_triangle($s){
        for($a = 1 ; $a <= $s ; $a++ ){
            for($b = 0 ; $b < $a ; $b++){
                print "*";
            }
            print "<br>";
        }
    }
    
    
?>
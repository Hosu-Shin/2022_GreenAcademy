<?php
//  $n1 = 9;
//  $n2 = 5;

//  $result = $n1 + $n2;
//  print "$n1 + $n2 = $result <br>";

//  $result = $n1 - $n2;
//  print "$n1 - $n2 = $result <br>";

//  $result = $n1 * $n2;
//  print "$n1 * $n2 = $result <br>";

//  $result = $n1 / $n2;
//  print "$n1 / $n2 = $result <br>";

//  $result = $n1 % $n2;
//  print "$n1 % $n2 = $result <br>";


 $n1 = 9;
 $n2 = 5;

 function sum($n1, $n2){  
    $result = $n1 + $n2;
    print "$n1 + $n2 = $result <br>";
    }
    sum($n1, $n2);

function minus($n1, $n2){  
    $result = $n1 - $n2;
    print "$n1 - $n2 = $result <br>";
    }
    minus($n1, $n2);

function multi($n1, $n2){  
    $result = $n1 * $n2;
    print "$n1 * $n2 = $result <br>";
    }
    multi($n1, $n2);

function div($n1, $n2){  
    $result = $n1 / $n2;
    print "$n1 / $n2 = $result <br>";
    }
    div($n1, $n2);


//강사님 답
function print_result($num1, $symbol, $num2, $result)
    {
        print "$num1 $symbol $num2 = $result <br>";
    }
function print_sum($num1, $num2) 
    {
        $result = $num1 + $num2;
        print_result($num1, "+", $num2, $result);
    }
function print_minus($num1, $num2) 
    {
        print_result($num1, "-", $num2, ($num1 - $num2));
    }
function print_multi($num1, $num2) 
    {
        print_result($num1, "*", $num2, ($num1 * $num2));
    }
function print_div($num1, $num2) 
    {
        print_result($num1, "/", $num2, ($num1 / $num2));
    }
function print_mod($num1, $num2) 
    {
        print_result($num1, "%", $num2, ($num1 % $num2));
    }
print_sum($n1, $n2);
print_minus($n1, $n2);
print_multi($n1, $n2);
print_div($n1, $n2);
print_mod($n1, $n2);

?>
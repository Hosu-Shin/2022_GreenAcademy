<?php

$a = 2000;
$b = 1999;
echo date($a) . "<br>";
echo date($b) . "<br>";
//$a = date("2000") ."<br>";
$c = date($b);
print $a;
echo date("L", strtotime("2000-01-01")) . "<br>";
echo date("L", strtotime("1999-01-01")) . "<br>";
echo date("Y") . "<br>";
echo date("L") . "<br>";

if(date("L", mktime(1,1,1,1,1,$a)) == true) {
    echo "1" . "<br>";
} else {
    echo "0" . "<br>";
}

print "윤년?" . date("L", mktime(1,1,1,1,1,$c)) . "<br>";

print "-------------------------------------ㅅㅂ" . "<br>";

if($a%400 == 0 ) {
    echo "1";
} else if($a%100 == 0) {
    echo "0";
} else if($a%4 == 0) {
    echo "1";
} else {
    echo "0";
}
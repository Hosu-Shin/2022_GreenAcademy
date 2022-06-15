<?php
 $num = 9;
 for($i = 0 ; $i < $num ; $i++)
 {
     
        for($j = $num - $i ; $j > 0 ; $j--)
        {
            echo " ";
        }
        
        for($q = 0 ; $q < 2*$i-1 ; $q++)
        {
            echo "*";
        }
     
        echo "<br />\n";
 }
    echo "<br>";

$num = 9;
 for($i = 0 ; $i < $num ; $i++)
 {
     
        for($j = $num - $i ; $j > 0 ; $j--)
        {
            echo " ";
        }
        
        for($q = 0 ; $q < 2*$i-1 ; $q++)
        {
            echo "*";
        }
     
        echo "<br />\n";
 }

 $num = 9;
 for($i = 0; $i<$num; $i++)
 {
   for($J = $num - $i; $J > 0; $J--)
   {
     echo " ";
   }
   for($q = 0; $q < $i; $q++)
   {
     echo "*";
   }
   for($w = 1; $w < $i; $w++)
   {
     echo "*";
   }
   echo "<br />\n";
 }


?>
<?php
   $arr = [10, 33, 12, 8, 1, 89];

   print_r($arr);
   print "<br>";

   $count = 6;
   echo "정렬되기 전 : ";

   for($a = 0; $a < 6; $a++){
       echo $arr[$a]." $num";
   }
   echo "<br/>";

    for($i = $count -2; $i >= 0; $i--) {
        for($j = 0; $j <= $i; $j++){
            if($arr[$j] > $arr[$j+1]){
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $tmp;
            }
        }
    }

    echo "오름차순 정렬 : ";

    for($a = 0; $a < 6 ; $a++){
        echo $arr[$a]. " ";
    }

    echo "<br>";

    for($q = count($arr)-1; $q > 0 ; $q--)
    {
        for($z = 0 ; $z < $q ; $z++)
        {
            if($arr[$z] > $arr[$z+1]) {
                $tmp = $arr[$z];
                $arr[$z] = $arr[$z+1];
                $arr[$z+1] = $tmp;
            }
        }
        print_r ($arr);
        print "<br>";

    }
    
    print_r($arr);
?>
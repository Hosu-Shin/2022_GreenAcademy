<?php
   $arr = [10, 33, 12, 8, 1, 89, 11];
    //선택정렬 구현해보기
    //참고 사이트 : https://gmlwjd9405.github.io/2018/05/06/algorithm-selection-sort.html

    $cnt = count($arr);
   for($i = 0; $i<$cnt-1; $i++)
   {
       for($j = $i+1 ; $j < $cnt; $j++)
       {
           if($arr[$i] > $arr[$j]){
               $tmp = $arr[$i];
               $arr[$i]=$arr[$j];
               $arr[$j] = $tmp;
           }
        }
        print_r($arr);
        print "<br>";
   }
   print_r($arr);
   print "<br>-------------------------</br>";

   //강사님 답

    for($q=0; $q<count($arr)-1; $q++){
        $idx = $q;
        for($z=$q+1; $z<count($arr); $z++){
            $idx = $z;
        }
    }

    if($idx != $i){
        $temp = $arr[$idx];
        $arr[$idx] = $arr[$i];
        $arr[$i] = $temp;
    }

    print_r ($arr);
    echo "<br>-----------------------</br>";

   //참고사이트 : https://zetawiki.com/wiki/PHP_%EC%84%A0%ED%83%9D%EC%A0%95%EB%A0%AC_%EA%B5%AC%ED%98%84

   function selection_sort(&$a) {
       $num = count($a);
       for($i=0; $i<$num; $i++){
           $mindex = $i;
           for($j=$i+1; $j<$num; $j++){
               if($a[$mindex] > $a[$j]) $mindex = $j;
           }
           echo "<br>";
           print_r($a);
           echo "<br>";
           $tmp=$a[$mindex];
           $a[$mindex]=$a[$i];
           $a[$i]=$tmp;
       }
   }

   $arr = [9, 1, 22, 4, 0, -1, 1, 22, 100, 10];
   selection_sort( $arr );
   echo "<br>";
   echo implode(", ",$arr);
?> 
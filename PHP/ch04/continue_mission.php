<?php
   /* 
   for 문 노터치
   continue를 활용하여 홀수만 출력
   1
   3
   5
   -
   99
   */

   for($i = 1 ; $i <= 100 ; $i++)
   {
      if($i%2 !== 1) {continue;} //출력하는 값 앞쪽에서 조건을 만들어 준다
      echo $i , "<br>";
   }
    
?>
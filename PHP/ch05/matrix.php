<?php
   $matrix = array (
        array(1, 2, 3, 0),
        array(4, 5, 6, 0, 1),
        array(7, 8, 9, 0)
   );

   print_r($matrix);
   print "<br><br>";

   // 숫자 5를 출력하고 싶다
   print $matrix[1][1];
   /*
   $matrix는 총 3명의 자식이 있다
   $matrix[1]은 $matrix안의 2번째줄(0번 부터 시작하기 때문에 2번째 줄이 1번이다)에 접근하게 된다
   $matrix[1][1]은 접근한 1번 자식의 1번째 자식을 불러 온다는 말이다
   */

   print "<br><br>";

   $child1 = $matrix[1];
   print $child1[1] . "<br>";
   /*
   $child1 는 $matrix의 1번 자식(2번째 줄)을 그대로 복사한다
   $child1은 array(4,5,6)의 복사값이 되었고 여기서  child1[0]은 4가 된다
   */

   print "<br><br>";

   print "matrix count : " . count($matrix) . "<br>";
   print "matrix[0] count : " . count($matrix[0]) . "<br>";
   print "matrix[1] count : " . count($matrix[1]) . "<br>";
   print "matrix[2] count : " . count($matrix[2]) . "<br>";
?>
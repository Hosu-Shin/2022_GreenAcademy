<?php
  
  $scores = array( 
     // 국, 영, 수
     array(100,100,100),   //영수
     array(90,80,70),      //순자
     array(55,65,75),      //영철
     array(90,80,55)       //옥순
  );

  $names = array("영수", "순자", "영철", "옥순");
  $each_scores = array(0, 0, 0, 0);

  for($i = 0 ; $i < count($scores) ; $i++) // 줄
  {
     for($z = 0 ; $z <count($scores[$i]) ; $z++) //칸
     {
         $each_scores[$i] += $scores[$i][$z];
     }
  }

  for($i = 0 ; $i<count($names) ; $i++)
  {
     print $names[$i] . " : " . $each_scores[$i] . "<br>";
  }

  echo "<br>";

  $names = array("0 평균", "1 평균", "2 평균", "값 없음");
  $each_scores = array(0, 0, 0);

  for($i = 0 ; $i < count($scores) ; $i++) // 줄
  {
     for($z = 0 ; $z <= count($scores[$i]) ; $z++) //칸
     {
         $each_scores[$i] += $scores[$z][$i];
     }
  }

  for($i = 0 ; $i<count($names) ; $i++)
  {
     print $names[$i] . " : " . $each_scores[$i] . "<br>";
  }

  echo "<br>";
  

  $names = array("영수 평균", "순자 평균", "영철 평균", "옥순 평균");
  $each_scores = array(0, 0, 0);

  for($i = 0 ; $i < count($scores) ; $i++) // 줄
  {
     for($z = 0 ; $z < count($scores[$i]) ; $z++) //칸
     {
         $each_scores[$i] += $scores[$i][$z];
     }
  }

  for($i = 0 ; $i<count($names) ; $i++)
  {
     print $names[$i] . " : " . $each_scores[$i]/count($scores[$i]) . "<br>";
  }

  echo "<br>";
  
  print $scores[0][0]+$scores[1][0]+$scores[2][0]+$scores[3][0];

  echo "<br><br>";


  $first = 0;
  $each_scores = array(0,0,0,0);
  for($i = 0 ; $i < count($scores) ; $i++)
  {
     $first += $scores[$i][0];  
  }
  print $first; 
  
?>
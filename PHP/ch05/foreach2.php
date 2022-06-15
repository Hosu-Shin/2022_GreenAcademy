<?php
    /*
      이름    키
      홍     182
      황     180
      테이블 만들기
    */

    $array = array(
        "Hong"  => 182.2,
        "Hwang" => 180.4,
        "Lim"   => 176.3,
        "Park"  => 174.1
    );

    echo "<table border = 1.5 cellpadding = '5'style = 'border-collapse:collapse'>
          <tr align = 'center'>";
        print "<td>" . "이름" . "<td>" . "키"."</td>" . "<tr>";
        foreach($array as $name => $height)
        {
            print "<tr align = 'center'"."</tr>";
            print "<td>" . $name . "</td>";
            print "<td>" . $height . "</td>";
        }
        echo "</tr>";
        echo "</table>";
    echo "<div>--------------</div>"
?>


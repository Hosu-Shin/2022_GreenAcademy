<?php
    $score = array(1, 2, 3, 4);
    $score2 = $score;

    print_r($score);
    print "<br>";
    print_r($score2);
    print "<br>";

    $score2[0] = 100;

    print_r($score);
    print "<br>";
    print_r($score2);
    print "<br>";

?>
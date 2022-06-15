<?php

    $data = file("./name.txt");

    print_r($data);
    print $data[0] . "<br>";
    print "--------------------------------------------<br>";

    foreach($data as $idx => $name) {
        print "[" . $idx . "] " . $name . "<br>";
    }

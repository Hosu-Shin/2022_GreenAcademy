<?php
    $freshman = array(
        "David"  =>  "Comuper",
        //key값     value값
        "Alice"  =>  "Math",
        "Elsa"   =>  "Physics",
        "Bob"    =>  "Music",
        "Chris"  =>  "Electronics",
    );

    print_r($freshman);
    print "<br><br>";
    print $freshman["David"] . "<br>";
    print $freshman["Alice"] . "<br>";
    print $freshman["Elsa"]  . "<br>";
    print $freshman["Bob"]   . "<br>";
    print $freshman["Chris"] . "<br>";

    $freshman["Bob"] = "Dance";
    print "<br><br>";
    print "Bob : " . $freshman["Bob"] . "<br>";

    $freshman["Frank"] = "History";
    print "Frank : " . $freshman["Frank"] . "<br>";

    $freshman[0] = "안녕";
    print "<br><br>";
    print_r($freshman);
?>
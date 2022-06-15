<?php
/*
문제) 
    dan = 2 

    2 X 1 = 2
    2 X 2 = 4
    ...
    2 X 9 = 18

    dan = 9 

    9 X 1 = 9
    9 X 2 = 18
    ...
    9 X 9 = 81
    
*/

    $dan = rand(2, 9);

    print_gugudan($dan);

    function print_gugudan($dan){
    for($i = $dan ; $i < 10 ; $i++)
    {
        for($z = 1 ; $z < 10 ; $z++)
        {
            $result = $i*$z;
            echo "${i} X ${z} = ${result} <br>";       
        }
        return $result;
    }
    }

    print "<br>-----------------------------------------<br>";

    print "<br>";
    print_gugudan_from_to(2, 6);

    function print_gugudan_from_to($sdan, $edan)
    {
        for($dan=$sdan; $dan <= $edan; $dan++)
        {
                print_gugudan($dan);
                print "<br>"; 
        }
        
    }

    print "<br>--------------------<br>";

    //원영씨 답
    gugudan($dan);
    function gugudan($num)
    {
        $result = 0;
        for($i = 1 ; $i < 10 ; $i++ ){
            $result = $num * $i ;
            print "$num X $i = $result <br>";
        }
    }

        

?>

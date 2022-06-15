<?php

        function inc(){
            static $i = 1; //static이 붙는 순간, 제일 처음 호출한 순간에만(최초에만) 실행되고, 그 이후로는 실행되지 않는다
            print $i . "<br>";
            $i += 1;
        }

        for($i=0 ; $i<10 ; $i++){
            inc();
        }

?>
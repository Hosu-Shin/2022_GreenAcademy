<?php

        define("URL", "localhost");
        define("USER", "root");
        define("PS", "506greendg@");
        define("DB", "board2");
        
        //define으로 정의해 놓지 않으면 매번 새롭게 적어야 해서 번거롭고, 수정하기도 힘들다

   
    $DB = mysqli_connect(URL, USER, PS, DB);

        $sql = "INSERT INTO i_board
                (title, ctnt)
                VALUES
                ('ME', 'Mario');";

    mysqli_query($DB, $sql);

    mysqli_close($DB);
?>
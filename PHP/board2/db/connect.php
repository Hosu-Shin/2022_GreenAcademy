<?php

    define("URL", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "506greendg@");
    define("DB_NAME", "p_board");

    function conn(){
        return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME);
   }
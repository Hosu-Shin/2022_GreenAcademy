<?php

        define("URL", "localhost");
        define("USER", "root");
        define("PS", "506greendg@");
        define("DB", "board2");
        
        //define으로 정의해 놓지 않으면 매번 새롭게 적어야 해서 번거롭고, 수정하기도 힘들다

    function DB() {
        return mysqli_connect(URL, USER, PS, DB); 
        //위에서 상수를 지정했기 때문에 'URL'이런 식으로 따옴표를 해 주지 않아도 된다
        //만약 위에서 define으로 상수를 잡아주지 않았을 겨우에는 문자열이므로 ''를 사용해야 한다
    }

?>
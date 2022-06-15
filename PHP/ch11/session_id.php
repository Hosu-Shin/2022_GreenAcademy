<?php

    session_start();
    echo "Session ID : ", session_id();
    //브라우저 마다 새롭게 할당되는 session_id
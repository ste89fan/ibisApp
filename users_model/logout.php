<?php

    if(session_id()==="" ) {
        session_start();
    }

    include_once("userLogin.php");

    $logOut = new UserLog();
    $logOut->Logout();


    ?>
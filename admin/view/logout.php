<?php
    session_start();
    //hancurkan sesi
    session_unset();
    //hancurkan juga
    session_destroy();
    //kemana
    header("Location: ../login_form");
?>
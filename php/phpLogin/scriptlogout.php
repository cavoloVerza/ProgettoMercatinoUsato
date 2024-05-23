<?php

    session_start();
    include('script.php');

    if( empty($_SESSION['loggato']) ){
                
        header("Location: ../../pages/pagesLogin/LoginPage.html");
    }

    unset($_SESSION['loggato']);
    echo "LOGOUT EFFETTUATO";
    
?>
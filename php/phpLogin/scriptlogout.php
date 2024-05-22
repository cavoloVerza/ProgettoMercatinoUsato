<?php

    session_start();
    include('script.php');

    if( empty($_SESSION['loggato']) ){
        
        header("Location: LoginPage.html");
    }
    unset($_SESSION['loggato']);
    
?>
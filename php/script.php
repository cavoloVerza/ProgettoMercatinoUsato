<?php

    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbName = "marcatinousato";

    mysqli_report(MYSQLI_REPORT_OFF);
    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        header("Location: ../pages/errore.html");
    }

?>
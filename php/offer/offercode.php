<?php

session_start();
include('../script.php');

if( empty($_SESSION["loggato"]) ){
    header("Location: ../../pages/login/login.php");
}


    $prezzo = $_POST["prezzo"];
    $ID_UT = $_SESSION['IDU'];
    $ID_OG = $_SESSION['id_oggetto'];
    
    $sql = "INSERT INTO proposta (Cifra, DataOra, IdOfferente, IdOggetto, Stato) VALUES ($prezzo, CURRENT_TIMESTAMP, $ID_UT, $ID_OG, 0)";
    $result = $conn->query($sql);
    if ($result == TRUE) {

        if($conn -> affected_rows == 0){

            $_SESSION["messaggio"] = "Error creating User: " . $conn->error;
            header('Location: error.php');
        }
        
        else {

            $_SESSION["messaggio"] = "New Offer created successfully";
            header('Location: ../../index.php');
        }

    }
    
    else {

        $_SESSION["messaggio"] = "Error creating User: " . $conn->error;
        header('Location: error.php');
    }

?> 
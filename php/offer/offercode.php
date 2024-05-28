<?php

session_start();
include('php/script.php');

 if( empty($_SESSION["loggato"]) ){
            
    header("Location: login.php");
}


    $prezzo = $_POST["prezzo"];
    $ID_UT = $_SESSION['compratore'];
    $ID_OG = $_SESSION['id_oggetto'];
    //$_SESSION["messaggio"] = $prezzo . ", " .  $ID_UT . ", " .  $ID_OG;

    
    $sql = "INSERT INTO proposta (Cifra, DataOra, IdOfferente, IdOggetto, Stato) VALUES ($prezzo, CURRENT_TIMESTAMP, $ID_UT, $ID_OG, 0)";
    $result = $conn->query($sql);
    if ($result == TRUE) {

        if($conn -> affected_rows == 0){

            $_SESSION["messaggio"] = "Error creating User: " . $conn->error;
            header('Location: error.php');
        }
        
        else {

            $_SESSION["messaggio"] = "New Offer created successfully";
            header('Location: index.php');
        }

    }
    
    else {

        $_SESSION["messaggio"] = "Error creating User: " . $conn->error;
        header('Location: error.php');
    }

?> 
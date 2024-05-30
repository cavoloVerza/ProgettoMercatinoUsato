<?php

    session_start();
    include('../script.php');


    $email = $_POST["email"];
    $password = $_POST["password"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $eta = $_POST["eta"];

    $HASHpassword = hash('sha256', $password);
    $sql = "INSERT INTO utente (Nome, Cognome, Email, Password, Eta) VALUES ('$nome', '$cognome', '$email', '$HASHpassword', '$eta')";

    if ($conn->query($sql) == TRUE) {

        if($conn -> affected_rows == 0){

            $_SESSION["messaggio"] = "Error creating User: " . $conn->error;
            $_SESSION["errorRegistrazione"] = true;
            header('Location: ../../pages/registrazione/reg.php');
            
        }
        
        else {
            
            header('Location: ../../pages/login/login.php');
        }

    }
    
    else {

        $_SESSION["messaggio"] = "Error creating User: " . $conn->error;
        $_SESSION["errorRegistrazione"] = true;
        header('Location: ../../pages/registrazione/reg.php');
        
    }

?> 
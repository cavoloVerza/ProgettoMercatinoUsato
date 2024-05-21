<?php

    session_start();
    include '../script.php';

    unset($_SESSION['']);
    unset($_SESSION['succReg']);

    $email = $_POST["email"];
    $password = $_POST["password"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $eta = $_POST["eta"];

    /*if() {

        //If che controlla la mail, accettate solo gmail, virgilio, yahoo, libero

    }*/

    $sql = "INSERT INTO utente (Nome, Cognome, Email, Password, Eta) VALUES ('$nome', '$cognome', '$email', '$password', '$eta')";
    if ($conn->query($sql) == TRUE) {

        if($conn -> affected_rows == 0){

            $_SESSION["errorReg"] = "Error creating User: " . $conn->error;
            header('Location: ../../pages/LoginPages/RegistrazionePage.php');
        }
        
        else {

            $_SESSION["succReg"] = "New User created successfully";
            header('Location: ../../pages/LoginPages/RegistrazionePage.php');
        }

    }
    
    else {

        $_SESSION["errorReg"] = "Error creating User: " . $conn->error;
        header('Location: ../../pages/LoginPages/RegistrazionePage.php');
    }

?> 
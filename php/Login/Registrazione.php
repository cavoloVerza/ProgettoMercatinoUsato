<?php

    session_start();
    include '../script.php';

    $email = $_POST["email"];
    $password = $_POST["password"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $eta = $_POST["eta"];

    $_SESSION["errore"] = "";
    $_SESSION["successo"] = "";

    $sql = "INSERT INTO utente (Nome, Cognome, Email, Password, Eta) VALUES ('$nome', '$cognome', '$email', '$password', '$eta')";
    if ($conn->query($sql) == TRUE) {

        if($conn -> affected_rows == 0){

            $_SESSION["errore"] = "Error creating User: " . $conn->error;
            header('Location: ../statusPages/ErroreLogin.php');
        }
        
        else {

            $_SESSION["successo"] = "New User created successfully";
            header('Location: ../../pages/paginaRegistrazione.php');
        }

    }
    
    else {

        $_SESSION["errore"] = "Error creating User: " . $conn->error;
        header('Location: ../statusPages/ErroreLogin.php');
    }

?> 
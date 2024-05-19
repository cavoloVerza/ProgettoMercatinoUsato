<?php

    session_start();
    include '../script.php';

    $email = $_POST["username"];
    $password = $_POST["password"];

    $_SESSION["errore"] = "";

    $sql = "SELECT * FROM utente WHERE Email = '$email'";
    $result = $conn->query($sql);

    if($result->num_rows == 0) {

        $_SESSION["errore"] = "Error Logging User: " . $conn->error;
        $_SESSION["statusLogin"] = true;
        header('Location: ../../index.php');
    } 
    
    else {

        $row = $result->fetch_assoc();

        if($password != $row["Password"]) {

            $_SESSION["errore"] = "Error wrong password: " . $conn->error;
            $_SESSION["statusLogin"] = true;
            header('Location: ../../index.php');
        } 
        
        else {

            $_SESSION["successo"] = "Login successfully";
            $_SESSION["username"] = $username;
            header('Location: ../../pages/home.html');
        }

    }

?> 
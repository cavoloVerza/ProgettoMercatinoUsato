<?php

    session_start();
    include '../script.php';

    unset($_SESSION['flagLoginErrore']);
    unset($_SESSION['flagLoginSuccesso']);

    $email = $_POST["username"];
    $password = $_POST["password"];

    $_SESSION["errore"] = "";

    $sql = "SELECT * FROM utente WHERE Email = '$email'";
    $result = $conn->query($sql);

    if($result->num_rows == 0) {

        $_SESSION["errore"] = "Error Logging User: " . $conn->error;
        header('Location: ../../php/LoginPHP/LoginCode.php');
    } 
    
    else {

        $row = $result->fetch_assoc();

        if($password != $row["Password"]) {

            $_SESSION["flagLoginErrore"] = true;
            $_SESSION["errorLog"] = "Error wrong password: " . $conn->error;
            header('Location: ../../php/LoginPHP/LoginCode.php');
        } 
        
        else {

            $_SESSION["flagLoginSuccesso"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["succLog"] = "Login successfully";
            header('Location: ../../index.php');
        }

    }

?> 
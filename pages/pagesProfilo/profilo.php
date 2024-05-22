<?php
    session_start();
    include('script.php');

    if( empty($_SESSION["loggato"]) ){
                
        header("Location: LoginPage.html");
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profilo Utente</title>
    </head>

    <body>
        <a class='btn btn-primary' href='uploadPage.php' role='button'>CARICA UN PRODOTTO</a>
    </body>

</html> 
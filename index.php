<?php
    session_start();
    include('php/script.php');
    
    if(!isset($_SESSION["statusLogin"])) {

        $_SESSION["statusLogin"] = false;
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>
    </head>

    <body>

        <a href="pages/LoginPages/LoginPage.php">pagina Login</a>
        
        <?php

            $sql = "SELECT * FROM oggetto";   
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "id: ". $row["id"]. " - Name: ". $row["nome"]. " ". $row["cognome"]. "<br>";
                }

            }
            else {
                echo "0 results";
            }
            
           
        ?>

        <a class='btn btn-primary' href='
        <?php 
            if($_SESSION["statusLogin"] == true) {
                ?>
                php/LoginPHP/ASAS.html
                <?php
            }
            else{
                ?>
                pages/LoginPages/LoginPage.php
                <?php
            }
        ?>
        ' role='button'>Link</a>

        

    </body>

</html>
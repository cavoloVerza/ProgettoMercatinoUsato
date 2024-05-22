<?php
    session_start();
    include('script.php');
    //unset($_SESSION["loggato"]);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>
    </head>

    <body>

        <a class='btn btn-primary' href='profilo.php' role='button'>PROFILO PERSONALE</a><br>
        <a class='btn btn-primary' href='scriptlogout.php' role='button'>LOG OUT</a>

        <?php

            $sql1 = "SELECT Nome, Descrizione FROM oggetto";   
            $result = $conn->query($sql1);
            
            $sql2 = "SELECT Foto, ID FROM oggetto";  
            $result2 = $conn->query($sql2);
            $row2 = mysqli_fetch_assoc($result2);

            
            if ($result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                $imgContent = $row2['Foto'];
            } else {
                echo "Image not found.";
            }


            if ($result->num_rows > 0) {
                while($row1 = $result->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<img src= " . $imgContent .  "alt='foto' style='width:100%'>";
                    echo "<div class='container'>";
                    echo "<h4><b> " . $row1['Nome'] . "</b></h4>";
                    echo "<p>" . $row1['Descrizione'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }

            }
            else {
                echo "0 results";
            }
            
           
        ?>

        <a class='btn btn-primary' href=' 
        <?php 
            if( !empty($_SESSION["loggato"]) ) {
                ?>
                https://www.youtube.com/
                <?php
            }
            else{
                ?>
                LoginCode.php
                <?php
            }
        ?>
        ' role='button'>Link</a>
        <br>
    </body>

</html>
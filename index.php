<?php

    session_start();
    include('php/script.php');

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Index</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>       
    </head>
    
    <body>

        <a class='btn btn-primary' href=' 
        <?php
        
            if( !empty($_SESSION["loggato"]) ) {

                ?>
                https://www.youtube.com/
                <?php
            }
            else{

                ?>
                pages/pagesLogin/LoginPage.html
                <?php
            }
        ?>
        ' role='button'>Link</a>

        <br><br>
        <a class='btn btn-primary' href="pages/pagesProfilo/profilo.php" role='button'>PROFILO PERSONALE</a><br><br>
        <a class='btn btn-primary' href="php/phpLogin/scriptlogout.php" role='button'>LOG OUT</a><br><br>

        <?php

            if( !empty($_SESSION['loggato'])){
                
                echo "<h1>Benvenuto " . $_SESSION['nome'] . "</h1>";
            }
            if( !empty($_SESSION['provaa'])){
                
                echo "<h1>" . $_SESSION['provaa'] . "</h1>";
            }

            $sql = "SELECT NomeOggetto, Foto, Descrizione, Nome, utente.Email, utente.Password FROM oggetto JOIN utente ON oggetto.IdUtente = utente.ID";   
            $result = $conn->query($sql);
            $COLONNA = mysqli_fetch_assoc($result);

            if ($result->num_rows > 0) {

                while($COLONNA = $result->fetch_assoc()) {

                    if( empty($_SESSION["pw"]) && empty($_SESSION["email"]) ){

                        echo "<div class='box'>";
                        echo "<img src= '" . $COLONNA['Foto'] .  "' alt='foto' class='Fotoo'>";
                        echo "<div>";
                        echo "<h4><b> " . $COLONNA['Nome'] . "</b></h4>";
                        echo "<p>" . $COLONNA['Descrizione'] . "</p>";
                        echo "<p> caricata da " . $COLONNA['Nome'] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    
                    }
                    
                    else{
                    
                        if($_SESSION["pw"] != $COLONNA["Password"] && $_SESSION["email"] != $COLONNA["Email"]){
                        
                            echo "<div class='box'>";
                            echo "<img src= '" . $COLONNA['Foto'] .  "' alt='foto' class='Fotoo'>";
                            echo "<div>";
                            echo "<h4><b> " . $COLONNA['Nome'] . "</b></h4>";
                            echo "<p>" . $COLONNA['Descrizione'] . "</p>";
                            echo "<p> caricata da " . $COLONNA['Nome'] . "</p>";
                            echo "</div>";
                            echo "</div>";
                        }   
                    }
                }

            }
            
            else {
                echo "0 results";
            }
            
           
        ?><br>

    </body>

</html>
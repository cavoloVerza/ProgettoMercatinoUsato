<?php
    session_start();
    if(!isset($_SESSION["statusLogin"])) {

        $_SESSION["statusLogin"] = false;
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>

        <link rel="stylesheet" href="css/stylesheet.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha38my-4-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    </head>

    <body>

        <div class="container text-center mt-5">

            <div class="row">
                <div class="col-12 my-4">

                    <h1 class="mb-4">Esegui l'accesso</h1>
                    <form action="php/login/Login.php" method="POST" class="mb-5">
                        <input type="email" class="inputText mb-3" placeholder="Email" name="username" required><br>
                        <input type="password" class="inputText mb-3" placeholder="Password" name="password" required><br>
                        <input type="submit" value="Accedi">
                    </form>
            
                    <h3 class="mb-3">Non hai un Account? REGISTRATI!</h3>
                    <a href="pages/paginaRegistrazione.html"><button type="button" class="btn btn-secondary">Registrati</button></a>

                </div>
            </div>

            <div class="row">
                <div class="col-12 my-4">

                    <?php
                        if($_SESSION["statusLogin"]) {

                            echo "<h1 class='errore mb-0'>Errore</h1>";
                            echo "<p>" . $_SESSION["errore"] . "</p>";
                        }
                    ?>

                </div>
            </div>

        </div>
        
    </body>

</html>
<?php

  session_start();
  include('php/script.php');

?>

<!DOCTYPE html>
<html lang="en">

    <head>
      <link rel="stylesheet" href="css/style.css">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Days+One&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
    </head>  

    <body>

      <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark bg-black">
        <div class="container-fluid">
          <img src="images/tondoo.png"class="logoNavbar">
          <div class="titolonav">
            <a  class="titolo" href="#">RE-VEND</a>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="#">Contact Us</a>
            </ul>
           
            <div class="p1">
              <p class="prof">Account</p>
            </div>
            <div class="p2 me-2">
              <a href="pages/profile/profile.php" class="iconaprof"><i class="bi bi-person-circle" ></i></a>
            </div>
          </div>
        </div>
      </nav>

      <div class="conatiner">

        <div class="row text-center mt-4">
          <div class ="col-12">
            <?php 
              if( !empty($_SESSION['loggato'])){          
                echo "<h1 class='h1Benvenuto'> Benvenuto " . $_SESSION['nome'] . "</h1>";
              }
            ?>
          </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4" id="rowina">

          <?php
                                
            $sql = "SELECT IDogg, NomeOggetto, Foto, Descrizione, Nome, Email, Password, ID FROM oggetto JOIN utente ON oggetto.IdUtente = ID";   
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($COLONNA = $result->fetch_assoc()) {
                if( empty($_SESSION["pw"]) && empty($_SESSION["email"]) ){
          ?>

<!-- ----------------------------------------- -->

                    <div class="col-lg-3 col-md-6 pippo">
                      <div class="card o">
                        <img src="<?php echo $COLONNA['Foto'] ?>" >
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $COLONNA['NomeOggetto'] ?></h5>
                          </div>
                        <div class="card-footer">
                        <form action='pages/profile/otherUserProfiel.php' method='POST' class="formProva">
                        <button id="bottoncino" type="submit" name="email" value="<?php $COLONNA['Email'] ?>">by <?php echo $COLONNA['Nome'] ?></button>
                        </form>
                          <form action='pages/offer/Offer.php' method='POST' class="formProva">
                            
                            <button id="bottoncino" type='submit' name='idogg' value=" <?php echo $COLONNA['ID'] . "," . $COLONNA['IDogg'] ?> " href="pages/offer/Offer.php">Offerta</button>
                          </form>
                        </div>
                      </div>
                    </div>

<!-- ----------------------------------------- -->

              <?php                          
                  }
                  else{
                    if($_SESSION['pw'] != $COLONNA['Password'] && $_SESSION['email'] != $COLONNA['Email']){
                ?> 
                    <div class="col-lg-4 col-md-6 pippo">
                      <div class="card o">
                        <img src="<?php echo $COLONNA['Foto'] ?>" class="immagine" >
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $COLONNA['NomeOggetto'] ?></h5>
                          </div>
                        <div class="card-footer">
                          
                        <form action='pages/profile/otherUserProfiel.php' method='POST' class="formProva">
                        <button id="bottoncino" type="submit" name="email" value="<?php $COLONNA['Email'] ?>">by <?php echo $COLONNA['Nome'] ?></button>
                        </form>
                          <form action='pages/offer/Offer.php' method='POST' class="formProva">
                            
                            <button id="bottoncino" type='submit' name='idogg' value=" <?php echo $COLONNA['ID'] . "," . $COLONNA['IDogg'] ?> " href="pages/offer/Offer.php">Offerta</button>
                          </form>
                        </div>
                      </div>
                    </div>

                    <?php
                    }   
                  }
                }
                }
                else {
                  echo "0 results";
                }                
                ?>
        </div>
        </div>
        

          <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
              <img class="footerlogo"src="images/logoo.png" alt="">
              <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="index.php" class="linketto">Home</a></li>
                <li class="nav-item"><a href="#" class="linketto">Help</a></li>
                <li class="nav-item"><a href="#" class="linketto">FAQs</a></li>
                <li class="nav-item"><a href="#" class="linketto">About</a></li>
                
              </ul>
            </footer>
          </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

</html>
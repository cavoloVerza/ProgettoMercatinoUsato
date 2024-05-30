<?php

   session_start();
   include('../../php/script.php');

   if( empty($_SESSION["loggato"]) ){
      header("Location: ../login/login.php");
   }

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
      <link rel="stylesheet" href="../../css/style.css">
   </head>

   <body>
   <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark bg-black">
        <div class="container-fluid">
          <img src="../../images/tondoo.png"class="logoNavbar">
          <div class="titolonav">
            <a  class="titolo" href="../../index.php">RE-VEND</a>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
              <a class="nav-link" href="#">Contact Us</a>
            </ul>
           
            <div class="p1">
              <p class="prof">Account</p>
            </div>
            <div class="p2 me-2">
              <a href="#" class="iconaprof"><i class="bi bi-person-circle" ></i></a>
            </div>
          </div>
        </div>
      </nav>

   <div>
   <div class="row row-cols-1 row-cols-md-3 g-4" id="rowina">

      <?php

         $SOMMA_ID = $_POST['idogg'];
         if (strpos($SOMMA_ID, ',') !== false) {
               
            $parti = explode(",", $SOMMA_ID);
            $ID_OGGETTO = $parti[1];
            $ID_UTENTE = $parti[0];
            $_SESSION['compratore'] = $ID_UTENTE;
            $_SESSION['id_oggetto'] = $ID_OGGETTO;

         }
         else {
            // Gestisci il caso in cui la stringa non contiene una virgola
            echo "Il formato di \$SOMMA_ID non è corretto.";
         }
         
         $sql = "SELECT IDogg, NomeOggetto, Foto, Descrizione, Nome, utente.Email, utente.Password, utente.ID FROM oggetto JOIN utente ON oggetto.IdUtente = utente.ID WHERE IDogg = $ID_OGGETTO";   
         $result = $conn->query($sql);
            
         if ($result->num_rows > 0) {
            while($COLONNA = $result->fetch_assoc()) { 

               $NomeOggetto = $COLONNA["NomeOggetto"];
               $Foto = $COLONNA["Foto"];
               $Descrizione = $COLONNA["Descrizione"];
            }
         }
      ?>

      <div class="container mt-5">

         <div class="row" >

            <div class="col-6">
         
               <div class="card">
            
                  <img src="../../<?php echo $Foto ?>" class="imgOffer">
               
               </div>

            </div>

            <div class="col-6">

               <h5>DETTAGLI</h5>
               <?php echo $Descrizione?>
               <br>
               <br>

               <form  action='../../php/offer/offercode.php' method='POST' class="my-4">
                  <input type="number" step="0.01" min="0" placeholder="0.00" name="prezzo" required><br><br>
                  <div class="btn_main">
                     <div class="buy_bt"><button style="border-width:1px" type='submit' name='idogg' value=" <?php $COLONNA['ID'] ?> "href="offercode.php">Buy Now</button></div>
                  </div>
               </form>
               
            </div>

         </div>

      </div>

      <!-- <div class="col-lg-3 col-md-6 pippo">
         <div class="tshirt_img"><img class="imma" src="../../<?php echo $COLONNA['Foto'] ?>"></div>
         <div class="card-body">
            <h5 class="card-title"><?php echo $COLONNA['NomeOggetto'] ?></h5>
         </div>
         <div class="card-footer">                    
            <form action='pages/offer/Offer.php' method='POST' class="formProva">
               <span class="text-body-secondary spn">by <?php echo $COLONNA['Nome'] ?></span>
            </form>
         </div>
      </div> 
      
      <div class="col-lg-9 col-md-6 pippo">
         <div>
            <h5 class="card-title"><?php echo "DESCRIZIONE" ?></h5>
            <p class="card-text" class=""><?php echo $COLONNA['Descrizione'] ?></p>
         </div>
         <form  action='../../php/offer/offercode.php' method='POST' class="my-4">
            <input type="number" step="0.01" min="0" placeholder="0.00" name="prezzo" required><br><br>
            <div class="btn_main">
               <div class="buy_bt"><button id="bottoncino" type='submit' name='idogg' value=" <?php $COLONNA['ID'] ?> "href="offercode.php">Buy Now</button></div>
            </div>
         </form>  
      </div>   -->

   </body>

</html>
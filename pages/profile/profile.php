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
              
              <a class="nav-link" href="../upload/uploadPage.php">Carica articolo</a>
              <a class="nav-link" href="../dashboard/dashboard.php">Dashboard</a>
              <a class="nav-link" href="../../php/logout/scriptlogout.php">Logout</a>
            </ul>
           
            <div class="p1">
              <p class="prof">Account</p>
            </div>
            <div class="p2 me-2">
              <a href="" class="iconaprof"><i class="bi bi-person-circle" ></i></a>
            </div>
          </div>
        </div>
    </nav>

   <div class="container">
    <div class="container boxx">
        <br>
      
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4" id="rowina">

      <?php   
        $idu = $_SESSION['IDU'];
        $sql2 = "SELECT Nome, Cognome, Eta, Email FROM utente WHERE utente.ID = '$idu'";   
        $result2 = $conn->query($sql2);
        
        echo "<div class='col-lg-12 col-md-12 text-center'>";

        while($row = $result2->fetch_assoc()){
          
            foreach ($row as $chiave => $value) {
                echo "<p>" . $chiave . ": ";
                echo $value  . "</p>";
                }
            
        

          echo "<p>";
        }
        echo "</div>";
        $sql = "SELECT * FROM oggetto JOIN utente ON oggetto.IdUtente = utente.ID";   
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while($COLONNA = $result->fetch_assoc()) {
            if($_SESSION['email'] == $COLONNA['Email']){
      ?>

              <div class="col-lg-5 col-md-6 pippo">
                  <div class="card o">
                    <img src="../../<?php echo $COLONNA['Foto'] ?>" >
                      <div class="card-body">
                      
                      </div>  
                      <div>
                        <h5 class=" ms-3 mb-4"><?php echo $COLONNA['NomeOggetto'] ?></h5>
                      </div>          
                      
                    <div class="card-footer">
                    <p class="card-text"><?php echo $COLONNA['Descrizione'] ?></p>
                    </div>
                  </div>
                </div>

      <?php
            }                          
          }
        }
        else {
          echo "0 results";
        }
                  
      ?>
                        </div>
                        <br>
                  
                  </div>

               </div>



      </div>
      
   </div>
               
</div>
               

   </body>
</html>